@extends('layouts.master')
@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>

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

                {!! Form::model($user,[
            'route' => ['users.update',$user->id],
             'method' => 'put'
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
                    <label for="name">verify your e-mail::</label>
                    {!! Form::text('email_confirmation',null,[
                  'class' => 'form-control',
                  'placeholder' => 'Enter email'
              ]) !!}
                </div>



                    @inject('role','Spatie\Permission\Models\Role')
                    {!! Form::select('role_id',$role->pluck('name','id')->toArray(),null,[
                  'class' => 'form-control',
                  'placeholder' => 'Select a Role'
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



