
@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Setting</h3>

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
                <form action="{{route('setting.update',$setting->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name:</label>

                        <input type="text" class="form-control" value="{{$setting->notification_settings_text}}" placeholder="Enter notification" name="notification">
                        <input type="text" class="form-control" value="{{$setting->about_app}}" placeholder="Enter about" name="about">
                        <input type="text" class="form-control" value="{{$setting->phone}}" placeholder="Enter phone" name="phone">
                        <input type="text" class="form-control" value="{{$setting->email}}" placeholder="Enter email" name="email">
                        <input type="text" class="form-control" value="{{$setting->fb_link}}" placeholder="Enter Hospital fb" name="fb">
                        <input type="text" class="form-control" value="{{$setting->insta_link}}" placeholder="Enter Hospital insta" name="insta">
                        <input type="text" class="form-control" value="{{$setting->whatsup_link}}" placeholder="Enter Hospital whatsapp" name="whatsapp">
                        <input type="text" class="form-control" value="{{$setting->tw_link}}" placeholder="Enter Hospital tw" name="tw">
                        <input type="text" class="form-control" value="{{$setting->google_link}}" placeholder="Enter Hospital google" name="google">
                        <input type="text" class="form-control" value="{{$setting->youtube}}" placeholder="Enter Hospital youtube" name="youtube">

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

