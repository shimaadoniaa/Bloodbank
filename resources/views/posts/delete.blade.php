@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Delete Post</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @include('partials.validation_errors')
                <form action="{{route('post.destroy',$post->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">

{{--                        <input  class="form-control" name="title">--}}
{{--                        <input  class="form-control" name="content">--}}
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection


