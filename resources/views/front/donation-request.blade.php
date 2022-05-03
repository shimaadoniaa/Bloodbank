@extends('front.master')


@section('content')
<!--inside-article-->
<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('home'))}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                </ol>
            </nav>
        </div>

        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2> Donation Request</h2>
            </div>
            <div class="content">
                <div class="container">
                    {!! Form::open(['method'=>'GET','action'=>'Front\MainController@donationRequest','role'=>'search'])  !!}

                    <div class="selection w-75 d-flex mx-auto my-4">
                        {!! Form::select('city_id',App\Model\City::pluck('name','id')->toArray(),request('city_id'),[
                          'class' => 'form-control',
                          'placeholder' => 'اختر المدينة'
                          ])!!}
                        {!! Form::select('blood_type_id',App\Model\BloodType::pluck('name','id')->toArray(),request('blood_type_id'),[
                        'class' => 'form-control',
                        'placeholder' => 'اختر الفصيله'
                        ])!!}
                        <button type="submit" style="border:none; background-color:transparent;" ><i class="fas fa-search"></i> </button>

                        <!-- <div><i class="fas fa-search"></i></div> -->
                    </div>
                {!! Form::close()!!}
                <!--End selection-->
                <div class="patients">
                    @foreach($donation_requests as $donation_request)
                        <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{$donation_request->bloodType->name}}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span>{{$donation_request->patient_name}}</li>
                            <li><span>مستشفى:</span> {{$donation_request->hospital_name}}</li>
{{--                            <li><span>المدينة:</span> {{$donation_request->city->name}}</li>--}}
                            <li><span>المدينة:</span> {{optional($donation_request->city)->name}}</li>
                        </ul>
                         <a href="{{url('request-details/'.$donation_request->id)}}">التفاصيل</a>

                    </div>
                    @endforeach
                        {{ $donation_requests->links() }}
            </div>
        </div>
    </div>
</div>



<!--footer-->
@endsection
