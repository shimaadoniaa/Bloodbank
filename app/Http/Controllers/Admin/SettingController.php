<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\City;
use App\Model\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {

        return view('settings.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'notification'=>'required',
            'about'=>'required',
            'whatsapp'=>'required',
            'fb'=>'required',
            'tw'=>'required',
            'insta'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'google'=>'required',
        ]);
        $city = new Setting;
        $city = $request->input('name');
        $city->save();

        toastr()->success('created');
        return redirect(route('setting.index'));


    }
    public function edit($id)
    {
        $setting=Setting::findOrFail($id);
        return view('settings.edit',compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'notification'=>'required',
           'about'=>'required',
           'whatsapp'=>'required',
           'fb'=>'required',
           'tw'=>'required',
           'insta'=>'required',
           'phone'=>'required',
           'email'=>'required',
           'google'=>'required',
           'youtube'=>'required',
        ]);

        $setting=Setting::findOrFail($id);
        $setting->update($request->all());


        toastr()->success('Edited');
        return redirect(route('setting.index'));

    }

}
