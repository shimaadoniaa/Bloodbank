@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Delete Category</h3>

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
                <form action="{{route('donation.destroy',$donation->id)}}" method="post">
                    @method('DELETE')
                    @csrf

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input  class="form-control" name="name">
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection



