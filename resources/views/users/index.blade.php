@extends('layouts.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List of Users</h3>

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
                <a href="{{route('users.create')}}" class="btn btn-primary">New User</a>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Role</th>
                            <th class="text-center">Edite</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($users))

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <ul>
                                        @foreach($user->roles as $role)
                                        <li>{{$role->name}}</li>
                                            @endforeach

                                        </ul>
                                    </td>


                                    <td class="text-center">
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('users.destroy',$user->id)}}"  method="post">
                                            @csrf
                                            @method("delete")

                                            <button type="submit" class="btn btn-danger"><i class="fas fa-user"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$users->links() !!}
                </div>

                @else

                    <div class="alert alert-danger" role='alert'>
                        No Data
                    </div >

                @endif



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>

@endsection


