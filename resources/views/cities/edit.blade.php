@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit City</h3>

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
            {!! Form::model($cityId,[
    'route' => ['city.update',$cityId->id],
    'method' => 'put'
]) !!}
  <div class="form-group">
    <label for="name">city:</label>
      {!! Form::text('name',null,[
    'class' => 'form-control',
    'placeholder' => 'Enter city name'
]) !!}
  </div>

  <div class="form-group">
       <label for="name">Governorate:</label>
      @inject('governorate','App\Model\Governorate')
      {!! Form::select('governorate_id',$governorate->pluck('name','id')->toArray(),null,[
    'class' => 'form-control',
    'placeholder' => 'Select a Governorate'
]) !!}
{{--      <select name="governorate_id" id="" class="form-control">--}}
{{--          @foreach($governorate->get() as $gov)--}}
{{--              <option value="{{$gov->id}}" @if($cityId->governorate_id == $gov->id) selected @endif>--}}
{{--                  {{$gov->name}}--}}
{{--              </option>--}}
{{--          @endforeach--}}
{{--      </select>--}}
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}



        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
@endsection


