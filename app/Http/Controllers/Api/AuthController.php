<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\City;
use App\Model\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use App\Http\ResponseTrait;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
   use ResponseTrait;

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required|unique:clients',
            'blood_type_id'=>'required',
            'last_donation_date'=>'required',
            'city_id'=>'required',
        ]);

        if ($validator->fails()){
            return $this->responseJson('0',$validator->errors()->first(), $validator->errors());
        }
        $request->merge(['password'=>bcrypt($request->password)]);

         $client=Client::create($request->all());
         $client->api_token=Str::random('60');
         $client->save();

        // $loginuser=$request->user();

         if ($request->has('city_id')) {
        $city=City::find($request->city_id);
        $client->governorate()->detach($city->governorate_id);
        $client->governorate()->attach($city->governorate_id);
      }

        if ($request->has('blood_type_id')) {

        $client->bloodTypes()->detach($request->blood_type_id);
        $client->bloodTypes()->attach($request->blood_type_id);
      }

           return $this->responseJson('1','تم الاضافة بنجاح',[

           'api_token' => $client->api_token,
            'client' => $client

           ]);
    }


      //        End Registration

    public function login(Request $request)
    {
        $validator = validator::make($request->all(), [

            'phone' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->TraitResponse('0', $validator->errors()->first(), $validator->errors());
        }
        $clients = Client::where('phone', $request->phone)->first();

        if ($clients) {
            if (Hash::check($request->password, $clients->password))
            {
                return $this->responseJson('1', 'Done', [
                    'api_token' => $clients->api_token,
                    'client' => $clients
                ]);
                return $this->responseJson('0', 'error num', 'null');
            }
            else {
                return $this->responseJson('0', 'error', 'null');


            }

        }
    }

 //        End Login


// --------------------------- Reset Password----------------------------------------------------


    public function resetPassword(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'phone'=>'required'
        ]);

        if ($validator->fails()){
            return $this->responseJson('0',$validator->errors()->first(), $validator->errors());
        }
        // find  -  get -- all - paginate
        // create - update - firstOrCreate
        $client = Client::where('phone',$request->phone)->first();
        if($client)
        {
            $client->pin_code = Str::random(6);
            $client->save();


           # send sms

  // smsMisr($request->phone,'your reset code is:'.$code);----------->>>>>>>


           # Send E-mail

        mail::to($client->email)
        // ->cc()
        ->bcc('examplemail.com')
        ->send(new resetpassword($code));




   return $this->responseJson('1', 'برجاء فحص الهاتف', [
    'pin_code'=>$code,
     'mail_fails'=>mail_fails()

       ]);
      }

        else
        {

           return $this->responseJson('0', 'يوجد خطا', 'null');
        }


    return $this->responseJson('0', 'لا يوجد حساب مرتبط بهذا الهاتف', 'null');


}

  // ------------------------New Password Reset----------------------------------------------

      public function newpassword(Request $request){

        $validator = validator::make($request->all(), [
            'pin_code' => 'required',
            'phone'    => 'required',
            'password' => 'required|confirmed',
        ]);

     if ($validator->fails()){
            return $this->responseJson('0',$validator->errors()->first(), $validator->errors());
        }

       $user = Client::where('pin_code',$request->pin_code)->where('pin_code','!=','0')->where('phone',$request->phone)->first();
        if($user)
        {
            $user->password = bcrypt($request->password);
            $user->password = null;
            $save  = $user->save();

          if ($save) {

         return $this->responseJson('0','تم تغير كلمة السر بنجاح', 'null' );

           }

           else{
            return $this->responseJson('0','حدث خطا حاول مرة اخري' ,'null' );
           }
         }


        else{

        return $this->responseJson('0','هذا الكود غير صالح' ,'null' );
        }

}











    }
