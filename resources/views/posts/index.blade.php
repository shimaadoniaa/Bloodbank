@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List of Posts</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="container">

          <a href="{{route('post.create')}}" class="btn btn-primary">New Post</a>
        <div class="row">

        @if(count($posts))

        @foreach($posts as $post)

        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{$post->title}}
                                <a href="{{route('post.show',$post->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Details</a>

                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">

                                        <p class="text-muted text-sm"> </p>
                                        <ul class="ml-6 mb-0 fa-ul text-muted">
                                            <img src=" {{asset($post->image)}}" class="img-fluid" alt="">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{$post->content}}</li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">

                                    <form action="{{route('post.destroy',$post->id)}}"  method="post">
                                        @csrf
                                        @method("delete")

                                        <button type="submit" class="btn btn-danger"><i class="fas fa-user"></i>Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            {!! $posts->links() !!}
               @else

        @toastr->error('No Posts');

        @endif





    @endsection


