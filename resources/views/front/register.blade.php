@extends('front.master')
@section('content')

<!--form-->
<div class="form">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('home'))}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                </ol>
            </nav>
        </div>
        <div class="account-form">
            <form>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الإسم" name="name">

                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="البريد الإلكترونى" name="email">

                <input placeholder="تاريخ الميلاد" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="date">

                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="فصيلة الدم" name="blood_type">

               @inject('governorate','App\Model\Governorate')
                {!! Form::select('governorate_id',$governorate->pluck('name','id')->toArray(),null,['class'=>'form-control','id'=>'governorates','placeholder'=>'اختر محافظة']) !!}
                @inject('city','App\Model\City')
                {!! Form::select('city_id',$city->pluck('name','id')->toArray(),null,['class'=>'form-control','id'=>'cities','placeholder'=>'المدينة']) !!}


                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="رقم الهاتف" name="phone">

                <input placeholder="آخر تاريخ تبرع" class="form-control" type="text" onfocus="(this.type='date')" id="date" name="donation_date">

                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" name="password">

                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="تأكيد كلمة المرور" name="password_confirmation">

                <div class="create-btn">
                    <input type="submit" value="إنشاء"></input>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#governorates").change(function (e) {
            e.preventDefault();
            // get gov
            // send ajax
            // append cities
            var governorate_id = $("#governorates").val();
            if (governorate_id)
            {
                $.ajax({
                    url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                    type: 'get',
                    success: function (data) {
                        if (data.status == 1)
                        {
                            $("#cities").empty();
                            $("#cities").append('<option value="">اختر مدينة</option>');
                            $.each(data.data, function (index, city) {
                                $("#cities").append('<option value="'+city.id+'">'+city.name+'</option>');
                            });
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) { // error callback
                        alert(errorMessage);
                    }
                });
            }else{
                $("#cities").empty();
                $("#cities").append('<option value="">اختر مدينة</option>');
            }
        });
    </script>
@endpush

@endsection

