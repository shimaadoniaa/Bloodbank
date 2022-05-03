<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\ResponseTrait;
use App\Model\BloodType;
use App\Model\Client;
use App\Model\Contact;
use App\Model\DonationRequest;
use App\Model\Governorate;
use App\Model\Post;
use App\Model\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    use ResponseTrait;

    public function home()
    {
        $client = Client::first();

        auth('client-web')->login($client);
        $donation_requests = DonationRequest::paginate(7);
        $posts = Post::where('publish_date', '<', Carbon::now()->toDateString())->take(9)->get();
        return view('front.home', compact(['posts', 'donation_requests']));
    }

//  --------------------------- About --------------------------------
    public function about()
    {
        $setting = Setting::first();
        return view('front.about', compact('setting'));
    }



//  --------------------------- Favourite Posts --------------------------------


    public function favouritePosts()
    {
        $client = Client::find(auth()->user()->id);
        $favposts = auth()->user()->posts()->paginate(5);

        return view('front.fav-post', compact('favposts'));
    }


    //  --------------------------- All Donation Request--------------------------------
    public function donationRequest(Request $request)
    {


        $donation_requests = DonationRequest::where(function ($query) use ($request) {
            if ($request->input('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            if ($request->input('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })->latest()->paginate(10);
        return view('front.donation-request', compact(['donation_requests']));

    }

    //  ---------------------------Donation Request Details --------------------------------
    public function donationDetails($id)
    {

        $donation_request = DonationRequest::findOrFail($id);
        return view('front.request-details', compact('donation_request'));
    }

//----------------------donationCreate-----------------------------

    public function donationCreate(DonationRequest $model)
    {
        return view('front.donation-form', compact('model'));
    }

    //  --------------------------- contact Us --------------------------------
    public function contactUs()
    {

        $contact = Contact::first();
        return view('front.contact-us', compact('contact'));
    }
//---------------------ContactSave--------------------------------
    public function contactSave(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:clients',
            'email' => 'required|unique:clients',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create($request->all());
        $contact->save();
        return redirect('/');
    }



//  ---------------------------DonationSave--------------------------------

    public function donationSave(Request $request)
    {
        $request->validate([
            'patient_name' => ['required'],
            'patient_age' => ['required'],
            'blood_type_id' => ['required', 'exists:blood_types,id'],
            'bags_num' => ['required'],
            'hospital_name' => ['required'],
            'hospital_address' => ['required'],
            'city_id' => ['required', 'exists:cities,id'],
            'phone' => ['required', 'digits:11'],
        ]);
        $donationRequest =$request->user()->donationRequests()->create($request->all());

        $clientsIds = $donationRequest->city->clients()
            ->whereHas('bloodTypes' ,function($q) use($request ,$donationRequest)
            {
                $q->where('blood_types.id',$donationRequest->blood_type_id);
            })->pluck('clients.id')->toArray();
        //create notification
        if(count($clientsIds))
        {

            $notification = $donationRequest->notifications()->create([
                'title' => 'يوجد حالة تبرع' ,
                'content' => 'فصيلة التبرع'.$donationRequest->bloodType->name .'المدينة'.$donationRequest->city->name
            ]);

            //attach client
            $u = $notification->client()->attach($clientsIds);
            dd($u);
            return redirect('/');
        }
    }

  //----------posts--------------------------------------------------------------

    public function posts(Request $request)
    {
        $posts = Post::where(function($query) use($request){
            if ($request->input('category_id')) {
                $query->where('category_id',$request->category_id);
            }
            if ($request->input('search_by_hospital_name')) {
                $query->where(function($query) use($request){
                    $query->where('hospital_name','like','%'.$request->search_by_name.'%');
                });
            }
        })->latest()->paginate(5);

        return view('front.posts',compact('posts'));
    }

    //--------------------------toggleFavourite---------------------
    public function toggleFavourite(Request $request)
    {
        $toggle = auth()->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success' ,$toggle);
    }

    //  --------------------------- Post Details--------------------------------

    public function postDetails($id)
    {

        $post = Post::findOrFail($id);
        $relatedPosts = Post::where('category_id', $post->category_id)->take(4)->get();
        return view('front.post-details', compact('post', 'relatedPosts'));
    }
}
