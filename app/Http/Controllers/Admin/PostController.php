<?php

namespace App\Http\Controllers\Admin;

use App\Model\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts=Post::paginate(5);

        return view('posts.index',compact('posts'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

//        dd($request->file("image"));

        $role=[
           'title'=>'required',
           'content'=>'required',
           'image'=>'required|image',
        ];

        $this->validate($request,$role);
        if($request->hasFile("image"))
        {
         $img= $request->file("image");
         $EX=$img->getClientOriginalExtension();
         $na=$img->getClientOriginalName();
         $path=rand(11111,99999).'.'.$EX;
         $request->file("image")->storeAs('img',$path);
        }
       $post=new Post();
        $post->category_id ='1';
        $post->publish_date = '2021-01-02';
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->details=$request->input('details');
        $post->image = 'storage/img/'.$path;
        $post->save();

        toastr()->success('Uploaded Done');
        return redirect(route('post.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    $post=Post::findOrFail($id);
        return view('posts.details',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $postId=Post::findOrFail($id);
        return view('posts.edit',compact('postId'));
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
        $posts=Post::findOrFail($id);
        $posts->update($request->all());
        $posts->save();
        toastr()->success('Edited');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect(route('post.index'));
        toastr()->error('Deleted');

    }
}
