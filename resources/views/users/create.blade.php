@extends('layouts.master')
@inject('role','Spatie\Permission\Models\Role')
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add User</h3>

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


                {!! Form::open([
            'route' => ['users.store'],
             'method' => 'POST'
])                !!}

                <div class="form-group">
                    <label for="name">Name:</label>
                    {!! Form::text('name',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter Role'
              ]) !!}
                </div>

                <div class="form-group">
                    <label for="name">email:</label>
                    {!! Form::text('email',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter email'
              ]) !!}
                </div>


                <div class="form-group">
                    <label for="name">Password::</label>
                    {!! Form::text('password',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter password'
              ]) !!}
                </div>



                @inject('role','Spatie\Permission\Models\Role')

                {!! Form::select('role_id',$role->pluck('name','id')->toArray(),null,[
              'class' => 'form-control',
              'placeholder' => 'Select a Role',
              'multiple'=>true
          ]) !!}



                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}






            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

