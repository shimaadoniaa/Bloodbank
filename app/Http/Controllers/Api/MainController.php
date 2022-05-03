<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\ResponseTrait;
use App\Model\City;
use App\Model\DonationRequest;
use App\Model\Governorate;
use App\Model\Post;
use Validator;
use Illuminate\Http\Request;


class MainController extends Controller
{
       use ResponseTrait;

   public function governorates(){

    $governorates=Governorate::all();
    return $this->responseJson('1','Done',$governorates);
   }

//          ----------- cities-------------------

    public function cities(Request $request){

        $cities=City::where(function ($quary) use($request){

        if($request->has('governorate_id')){

           $quary->where('governorate_id',$request->governorate_id);
        }

        })->get();

        return $this->responseJson('1','Done',$cities);
    }

    // -----------------------Posts--------------------------------
    public function posts(Request $request){
        // select * from posts where id = ? and (category_id = ? and (title like %?% or content like %?%))
        $posts=Post::where(function($query) use($request){


            if ($request->keyword) {
                $query->searchByKeyword($request->keyword);
            }
            if ($request->keyword) {
                $query->searchByKeyword($request->keyword);
            }

//            if ($reque*st->keyword) {;8
//                $query->searchByKeyword($request->keyword);
//            }
        })->with('category')->paginate(10);

//        $post = Post::first();
//        echo optional($post->category)->name;// try to get property name of non object --> null
//        echo $post->category->name ?? null;

        return $this->responseJson('1','Done',$posts);
    }
    // -----------------------PostRequestDonation--------------------------------
    public function postRequestDonation(Request $request){

      $validator=Validator::make($request->all(),[

          'patient_name'=>'required',
          'age'=>'required',
          'blood_type_id'=>'required',
          'bags_num'=>'required',
          'hospital_address'=>'required',
          'governorate_id'=>'required',
          'details'=>'required',
          'city_id'=>'required',
          'latitude	'=>'required',
          'longitude'=>'required',
          'hospital_name'=>'required',
          'client_id'=>'required'
      ]);

      if($validator->fails()) {
         return $this->responseJson('0',$validator->errors()->first(),$validator->errors());
      }
          $donationRequest = DonationRequest::create($request->all());



         //------notification-----------

        $clientIds=$donationRequest->city->governorate->client()->whereHas('bloodTypes',function($q) use($request){
           $q->where('blood_types.id',$request->blood_type_id);

        })->pluck('clients.id')->toArray();




       if(count($clientIds)) {
           $notification = $donationRequest->notifications()->create([
               'title' => 'احتاج  متبرع  لفصيلة',
               'content' => $donationRequest->bloodType->name . 'محتاج متبرع لفصيلة  '
           ]);

 //---------------- attach clients to notification----------------

       $notification->clients()->attach($clientIds);

 //----------get token for FCM---------------------------------------

 $tokens=Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();


   if(count($tokens))
   {

    $title=$notification->title;
    $content=$notification->content;
    $data=[

      'donation_request_id'=> $donationRequest->id
    ];

 // --------------send notification-------------------------------------------
      $send = notifyByFirebase($title,$body,$tokens,$data);

   }
    }

     return $this->responseJson('1','تم الاضافة بنجاح',$donationRequest);


   }



    // -----------------------GetRequestDonation--------------------------------

    public function getRequestDonation(Request $request){

        $getRequest=DonationRequest::where(function ($q) use($request) {
            if ($request->categorey_id) {
                $q->where('category_id', $request->categorey_id);
            }
            if ($request->blood_type_id){
               $q->where('blood_type_id',$request->blood_type_id);
            }
        })->with('category')->paginate();

        return $this->responseJson('1','Done',  $getRequest);
    }


//---------------------------Profile--------------------------------------

   public function profile(Request $request)
   {
     $validator=Validator::make($request->all(),[
       'password'=> 'confirmed',
       'email'=>Rule::unique('clients')->ignore($request->user()->id),
       'phone'=>Rule::unique('clients')->ignore($request->user()->id),
        ]);
       if ($validator->fails())
       {
        return $this->responseJson('0',$validator->errors()->first(),$validator->errors());
         }

      $loginuser=$request->user();

      $loginuser->update($request->all());

      if ($request->has('password')) {

         $loginuser->password = bcrypt($request->password);
       }

      $loginuser->save();


// تعديل بيانات لاشعارات   Edit notification settings



    $data= [

      $user=$request->user()->fresh()->load()
          ];
      return $this->responseJson('1','م حفظ البيانات بنجاح', $data);


   }







}
