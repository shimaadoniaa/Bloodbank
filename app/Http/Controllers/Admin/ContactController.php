<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $contacts=Contact::paginate(3);
        return view('contacts.index',compact('contacts'));
    }
    public function create(){
    }
    public function store(Request $request){
        $roles=[
          'name'=>'required',
          'email'=>'required',
          'phone'=>'required',
          'subject'=>'required',

        ];
        $this->validate($request,$roles);
        $contact=new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->phone=$request->input('phone');
        $contact->subject=$request->input('subject');
        $contact->message=$request->input('message');
        $contact->save();
        toastr()->success('contact created');
        return redirect(route('contact.index'));
    }


    public function edit($id){
    }
    public function update(){}


    public function destroy($id){
        $contact=Contact::findOrFail($id);
        $contact->delete();

        toastr()->error('Deleted');
        return redirect(route('contact.index'));
    }



}
