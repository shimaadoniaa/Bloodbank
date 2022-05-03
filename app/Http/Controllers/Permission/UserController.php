<?php

namespace App\Http\Controllers\Permission;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users= User::paginate(5);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $msg = [

            'name.required' => 'name is required',
            'email.required' => 'email is required',
            'password.required' => 'password is required'

        ];

        $rules = [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ];

        $this->validate($request, $rules, $msg);
        //$request->merge(['password'=>bcrypt($request->password)]);
        //$user = User::create($request->all());
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);

        $user->save();

        toastr()->success('User created');
        return redirect(route('users.index'));
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
        $user=User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->Update($request->all());

        toastr()->success('Edited');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        toastr()->error('Deleted');
        return redirect(route('users.index'));
    }

    public function changPassword()
    {
      return view('users.change-user-password');
    }

    public function changPasswordSave(Request $request)
    {
        $role=[
          'old-password'=>'required',
          'new-password'=>'required|confirmed',

        ];
        $this->validate($request,$role);

        $user=auth()->user();

        if(Hash::check($request->input('old-password'),$user->password))
        {
            $user->password=bcrypt($request->input('new-password'));
            $user->save();
            toastr()->success('password changed');
            return view('users.change-user-password');
        }
        else
        {
            toastr()->success('password is wrong');
            return view('users.change-user-password');
        }
    }


}
