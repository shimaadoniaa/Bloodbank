
@extends('layouts.master')

@section('content')



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Request</h3>

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

           {!! Form::model([
         'route' => ['donation.create'],
         'method' => 'PUT'
                ]) !!}
                <div class="form-group">
                    <label for="name">name:</label>
                    {!! Form::text('name',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter  name'
              ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">Age:</label>
                    {!! Form::text('age',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter age'
              ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">BloodType:</label>
                    @inject('bloodType','App\Model\BloodType')
                    {!! Form::select('type',$bloodType->pluck('name','id')->toArray(),null,[
                    'class' => 'form-control',
                    'placeholder' => 'Select a BloodType'
                    ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">Bugs:</label>
                    {!! Form::text('number',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter  number of bugs'
              ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">Hospital Name:</label>
                    {!! Form::text('name_hospital',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter  number of bugs'
              ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">Hospital Address:</label>
                    {!! Form::text('address',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter Hospital Address'
              ]) !!}

                    <div class="form-group">
                        <label for="name">Hospital phone:</label>
                        {!! Form::text('phone',null,[
                         'class' => 'form-control',
                        'placeholder' => 'Enter phone'
                  ]) !!}

                        <div class="form-group">
                            <label for="name">Details:</label>
                            {!! Form::textarea('details',null,[
                             'class' => 'form-control',
                            'placeholder' => 'Enter Details'
                      ]) !!}

                            <div class="form-group">
                                <label for="name">latitude:</label>
                                {!! Form::text('latitude',null,[
                                 'class' => 'form-control',
                                'placeholder' => 'Enter latitude'
                          ]) !!}

                                <div class="form-group">
                                    <label for="name">longitude:</label>
                                    {!! Form::text('longitude',null,[
                                     'class' => 'form-control',
                                    'placeholder' => 'Enter longitude'
                              ]) !!}

                                    <div class="form-group">
                                        <label for="name">Governorate:</label>
                                        @inject('governorate','App\Model\Governorate')
                                        {!! Form::select('governorate',$governorate->pluck('name','id')->toArray(),null,[
                                         'class' => 'form-control',
                                          'placeholder' => 'Select a Governorate'
                                            ]) !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="name">City:</label>
{{--                                        @inject('city','App\Model\City')--}}
                                        @inject('governorate','App\Model\Governorate')
                                        {!! Form::select('city',$governorate->city->pluck('name','id')->toArray(),null,[
                                         'class' => 'form-control',
                                         'placeholder' => 'Select a City'
                                          ]) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> client:</label>
                                        {!! Form::text('client',null,[
                                         'class' => 'form-control',
                                        'placeholder' => 'Enter client'
                                  ]) !!}

                                    </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                                    {!! Form::close() !!}



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection


