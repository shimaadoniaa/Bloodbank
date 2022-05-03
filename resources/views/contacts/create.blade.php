
@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Contact</h3>

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
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf()
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Phone:</label>
                        <input type="text" class="form-control" placeholder="Enter phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Subject:</label>
                        <input type="text" class="form-control" placeholder="Enter subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="name">Message:</label>
                        <input type="text" class="form-control" placeholder="Enter message" name="message">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection


