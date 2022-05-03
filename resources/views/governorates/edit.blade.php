@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit governorate</h3>

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
       <form action="{{route('governorate.update',$governorateId->id)}}" method="POST">
           @csrf()
           @method('put')
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" value="{{$governorateId->name}}" placeholder="Update governorate" name="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
@endsection


