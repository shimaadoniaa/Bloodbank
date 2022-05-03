<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{



 // ------------register Token----------------------------------------------


    public function registerToken(){
     $validator=Validator::make($request->all(),[

          'token'=>'required',
          'type'=>'required|in:andorid,ios',
      ]);

     if($validator->fails()) {
         return $this->responseJson('0',$validator->errors()->first(),$validator->errors());
      }

     Token::where('token',$request->token)->delete();
     $request->user()->tokens()->create($request->all());
     return $this->responseJson('1','تم التسجيل بنجاح'); 

    }
 // ------------remove Token----------------------------------------------

    public function removeToken(Request $request){

    $validator=Validator::make($request->all(),[

          'token'=>'required',
      ]);

     if($validator->fails()) {
         return $this->responseJson('0',$validator->errors()->first(),$validator->errors());
      }
 
   Token::where('token',$request->token)->delete();
   return $this->responseJson('1',' token removed,ت م الحذف بنجاح');
    }
}
