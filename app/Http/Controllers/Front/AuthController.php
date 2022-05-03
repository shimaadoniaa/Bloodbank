<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\ResponseTrait;
use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    use ResponseTrait;

    public function register()
    {
       return view('front.register');
    }
    public function registerSave(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:clients',
            'dob'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
            'phone'=>'required',
            'last_donation_date'=>'required',
            'password'=>'required|confirmed',
        ]);

        $request->merge(['password'=>bcrypt($request->password)]);
        $client=Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        auth('client-web')->login($client);
        return redirect('/');
    }

    public function login()
    {
        return view('front.login');
    }
    public function loginSave(Request $request)
    {
     $validator = validator()->make($request->all(),[
       'phone'=>'required',
       'password'=>'required'
     ]);

    $client=Client::where('phone',$request->phone)->first();
     if($client)
     {
        if(Hash::check($request->password,$client->password))
        {
          auth('client-web')->login($client);
          return redirect('/');
        }
        else
        {
          return redirect()->back();
        }
     }
     else
     {
       return redirect()->back() ;
     }
   }

   public function logout(Request $request)
   {
     auth('client-web')->logout();
     return redirect('/');
   }

    public function resetPassword(Client $model)
    {
      return view('front.reset-password',compact('model'));
    }

    //passwordReset

    public function passwordReset(Request $request)
    {
      $user = Client::where('phone', $request->phone)->first();

      if($user)
      {
        $code = Str::random_bytes(6);
        $update = $user->update(['pin_code' => $code]);
        if($update)
        {
          Mail::to($user->email)
              ->bcc("shimaa@gmail.com")
              ->send(new ResetPassword($code));

          return redirect('/new-password');
        }
        else
        {
          return redirect()->back();
        }
      }
      else
      {
        return redirect()->back();
      }
    }

     //newPassword
public function newPassword(Client $model)
    {
      return view('front.new-password',compact('model'));
    }

    public function passwordChanged (Request $request)
    {
      $validator = validator()->make($request->all(),[
        'pin_code' =>'required',
        'phone' => 'required',
        'password'=> 'required|confirmed'
      ]);

      $user = Client::where('pin_code' ,$request->pin_code)->where('pin_code' ,'!=',0)
      ->where('phone',$request->phone)->first();
      if ($user)
      {
          $user->password = bcrypt($request->password);
          $user->pin_code = null ;
          $user->save();
          return redirect('/');

       }
       else
       {
         return redirect()->back();
       }
    }


    //profile
    public function profile(Client $model)
     {
       return view('front.profile',compact('model'));
     }

      //profileSet

      public function profileSet(Request $request)
      {
        $user =$request ->user();
        $user->update($request->except('password'));
        if($request->has('password'))
        {
          $user->password =bcrypt($request->password);
        }
        $user->save();
        return redirect('/');
      }


       //notificationSetting

      public function notificationSetting(Client $model)
      {
        $clientGovernate = auth()->user()->governorate()->pluck('governorates.id')->toArray();
        $clientBloodType = auth()->user()->bloodTypes()->pluck('blood_types.id')->toArray();
        return view('front.notification-setting');
      }

      //updateNotificationSettings

      public function updateNotificationSettings(Request $request)
      {
         $validator = validator()->make($request->all(),[
           'governorates' => 'required|array' ,
           'governorates.*' => 'exists:governorates,id' ,
           'bloodtypes' => 'required|array',
           'bloodtypes.*' => 'exists:blood_types,id' ,
           ]);

           $request->user()->governorates()->sync($request->governorates);
           $request->user()->bloodTypes()->sync($request->bloodtypes);
           return redirect('/');
      }








}
