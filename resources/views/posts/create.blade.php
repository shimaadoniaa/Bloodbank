@extends('layouts.master')

@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Post</h3>
               <br>
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                <div class="form-group">
                    <input type="text" name="title" id="title" placeholder="Enter Title" >
                    <input type="text" name="content" id="content" placeholder="Enter content">
                </div>
                    <div class="form-group">
                        <input type="textarea" name="details" id="title" placeholder="Enter details" >

                    </div>
                <div class="form-group">
                    <input type="file" name="image" id="img" class="form-control" >
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn-default">Upload Image</button>
                </div>
                </form>



            </div>

            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

