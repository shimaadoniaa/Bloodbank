@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
@include('partials.validation_errors')
                <form action="{{url(route('change-password-submit'))}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control" name="old-password" id="exampleInputEpassword"  placeholder="Enter your old password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" class="form-control" name="new-password" id="exampleInputPassword1" placeholder="New Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password Confirmation</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="new-password_confirmation" placeholder="Password Confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
