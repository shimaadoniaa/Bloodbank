<?php

namespace App\Http\Controllers\Admin;
use App\Model\Governorate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates=Governorate::paginate(5);

        return view('governorates.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules=[

            'name'=>'required'
        ];

        $msg=[

            'name.required'=>'name is required'
        ];

        $this->validate($request,$rules,$msg);

        $governorate = new Governorate;
        $governorate->name = $request->input('name');
        $governorate->save();


         toastr()->success('Created');
        return redirect(route('governorate.index'));




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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
       $governorateId = Governorate::findOrFail($id);

      return view('governorates.edit',compact('governorateId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $governorate=Governorate::findOrFail($id);
        $governorate->Update($request->all());

        toastr()->success('Edited');
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $governorate=governorate::findOrFail($id);
        $governorate->delete();
        toastr()->error('Deleted');
        return redirect(route('governorate.index'));
    }
}
