@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="card-header">
            <h3 class="card-title">Add City</h3>

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
      @inject('city','App\Model\City')
            {!! Form::model('$city',[
        'route' => 'city.create',
        'method' => 'put'
               ]) !!}

            <div class="form-group">
                <label for="name">City:</label>
                {!! Form::text('name',null,[
                 'class' => 'form-control',
                'placeholder' => 'Enter City'
          ]) !!}
            </div>

            <div class="form-group">
                <label for="name">Governorate:</label>
                @inject('governorate','App\Model\Governorate')
                {!! Form::select('name_gov',$governorate->pluck('name','id')->toArray(),null,[
                 'class' => 'form-control',
                  'placeholder' => 'Select a Governorate'
                    ]) !!}
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}


        </div>
        <!-- /.card-body -->
        <!-- /.card -->

    </section>
@endsection


