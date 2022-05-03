<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Model\DonationRequest;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $donations=DonationRequest::paginate(3);
        return view('donation-requests.index',compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('donation-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=[
           'name'=>'required',
           'type'=>'required',
           'age'=>'required',
           'number'=>'required',
           'name_hospital'=>'required',
           'address'=>'required',
           'phone'=>'required',
           'details'=>'required',
           'longitude'=>'required',
           'latitude'=>'required',
           'city'=>'required',
           'governorate'=>'required',
           'client'=>'required',

        ];

          $this->validate($request,$role);

        $donation =new DonationRequest();
        $donation->patient_name=$request->input('name');
        $donation->age=$request->input('age');
        $donation->blood_type_id=$request->input('type');
        $donation->bags_num=$request->input('number');
        $donation->hospital_address=$request->input('address');
        $donation->hospital_name=$request->input('name_hospital');
        $donation->hospital_phone=$request->input('phone');
        $donation->details=$request->input('details');
        $donation->latitude=$request->input('latitude');
        $donation->longitude=$request->input('longitude');
        $donation->client_id=$request->input('client');
        $donation->city_id=$request->input('city');
        $donation->governorate_id=$request->input('governorate');

        $donation->save();
        toastr()->success('category created');
        return redirect(route('donation.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donationId=DonationRequest::findOrFail($id);
        return view('donation-requests.edit',compact('donationId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donations=DonationRequest::findOrFail($id);
        $donations->Update($request->all());

        toastr()->success('Edited');
        return redirect(route('donation.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation=DonationRequest::findOrFail($id);
        $donation->delete();

        toastr()->error('Deleted');
        return redirect(route('donation.index'));
    }
}
