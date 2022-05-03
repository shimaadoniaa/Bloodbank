<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\ResponseTrait;
use App\Model\Favorite;
use App\Model\Post;
use App\Model\Contact;
use App\Model\Setting;
use Validator;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ResponseTrait;



//   -------------------------- Get Setting ------------------------

    public function setting(){

        $setting=Setting::first();
      return $this->responseJson('1','Done',$setting);
    }


    //   -----------------------  Toggle Favorite --------------------


    public function toggleFavoritelist(Request $request){

       $validator=Validator::make($request->all(),[

        'post_id'=>'required|exists:post,id'

       ]);

        if($validator->fails())
         {
         return $this->responseJson('0',$validator->errors()->first(),$validator->errors());
          }

      $toggle=$request->user()->posts()->toggle($request->post_id);

       return $this->responseJson('0','ok',$toggle);
     }



    //   --------------------------- Get Favorite ------------------


     public function getFavorite(Request $request)

    {
        $getfav = $request->user()->posts()->latest()->paginate(10);


        //$getfav = Favorite::with(['post','client'])->get();

        return $this->responseJson('1', 'Done', $getfav);
        }


 //   -------------------ContacUs-------------------------------------

    public function contactus(Request $request){

     $validator=Validator::make($request->all(),[


      'email'  =>'required',
      'phone'  =>'required',
      'social' =>'required',
      'title_msg' =>'required',
      'message'=>'required',

          ]);

      if($validator->fails()) {
         return $this->responseJson('0',$validator->errors()->first(),$validator->errors());

       $contact = Contact::create($request->all());
       $contact->save();


    }
  }

  //   ------------------------------- Report ----------------------------

    // public function report(){}



}
