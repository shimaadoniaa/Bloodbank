
@extends('layouts.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DonationRequest</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Donation Request</li>
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
                <h3 class="card-title">List of DonationRequest</h3>

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
                <div class="row">


                    @if(count($donations))

              <div class="table-responsive">
                   <table class="table">
                       <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Patient Name</th>
                           <th scope="col">Age</th>
                           <th scope="col">Blood Type</th>
                           <th scope="col">Bags Num</th>
                           <th scope="col">Hospital Address</th>
                           <th scope="col">Governorate</th>
                           <th scope="col">Details</th>
                           <th scope="col">City</th>
                           <th scope="col">Latitude</th>
                           <th scope="col">Longitude</th>
                           <th scope="col">Hospital Name</th>
                           <th scope="col">Client</th>
                           <th scope="col">processes</th>
                       </tr>
                       </thead>
                       <tbody>
                     @foreach($donations as $donation)


                             <tr>
                             <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$donation->patient_name}}</td>
                               <td>{{$donation->age}}</td>
                               <td>{{$donation->bloodType->name}}</td>
                               <td>{{$donation->bags_num}}</td>
                               <td>{{$donation->hospital_address}}</td>

                               <td>{{$donation->city->governorate->name ?? ""}}</td>
                               <td>{{$donation->details}}</td>
                               <td>{{$donation->city->name ?? ""}}</td>
                               <td>{{$donation->latitude}}</td>
                               <td>{{$donation->longitude}}</td>
                               <td>{{$donation->hospital_name}}</td>
                               <td>{{$donation->client->name ?? ""}}</td>
                               <td>
                                <form action="{{route('donation.destroy',$donation->id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                               </td>

                                </tr>
                             @endforeach
                                </tbody>

                                </table>
                        </div>


                     {!! $donations->links() !!}
                      </div>
                    @else

                    <div class="alert alert-danger" role='alert'>
                        No Data
                    </div >

                    @endif

            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </section>

@endsection

















