@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
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
            <h3 class="card-title">Settings</h3>
        </div>
        <div class="container">

            <div class="row">
                <div class="table-responsive">
                    <table class="table">
                        @if(count($settings))

                        @foreach($settings as $setting)
                        <thead>
                        <tr>
                            <th>Notification</th>
                            <th>About </th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>facebook</th>
                            <th>instagram</th>
                            <th>whatsapp</th>
                            <th>twitter</th>
                            <th>google</th>
                            <th>youtube</th>
                            <th class="text-center">Edite</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="txt-oflo">{{$setting->notification_settings_text}}</td>
                            <td>{{$setting->about_app}}</td>
                            <td>{{$setting->phone}}</td>
                            <td>{{$setting->email}}</td>
                            <td>{{$setting->fb_link}}</td>
                            <td>{{$setting->insta_link}}</td>
                            <td>{{$setting->whatsup_link}}</td>
                            <td>{{$setting->tw_link}}</td>
                            <td class="txt-oflo">{{$setting->google_link}}</td>
                            <td><span class="text-success"></span>{{$setting->youtube}}</td>
                            <td class="text-center">
                                <a href="{{route('setting.edit',$setting->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                    @else

                        <div class="alert alert-danger" role='alert'>
                            No Data
                       </div >

                    @endif
                </div>
            </div>
        </div>
    </div>


 @endsection














