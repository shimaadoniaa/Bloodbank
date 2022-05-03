@extends('layouts.master')

@section('content')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Governorate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Governorate</li>
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
          <h3 class="card-title">List of Governorate</h3>

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
       <a href="{{route('governorate.create')}}" class="btn btn-primary">New Governorate</a>

       <div class="table-responsive">
       <table class="table table-bordered">
       <thead>
        <tr>
         <th>#</th>
         <th>Name</th>
         <th class="text-center">Edite</th>
         <th class="text-center">Delete</th>
       </tr>
       </thead>
       <tbody>
          @if(count($governorates))

       @foreach($governorates as $governorate)
        <tr>
         <td>{{$loop->iteration}}</td>
         <td>{{$governorate->name}}</td>
         <td class="text-center">
       <a href="{{route('governorate.edit',$governorate->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
         </td>
         <td class="text-center">
             <form action="{{route('governorate.destroy',$governorate->id)}}"  method="post">
                 @csrf
                 @method("delete")

                 <button type="submit" class="btn btn-danger"><i class="fas fa-user"></i>Delete</button>
             </form>
         </td>
       </tr>
       @endforeach
       </tbody>
       </table>
           {!!$governorates->links() !!}
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


