@extends('front.master')
@section('content')
    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Change Password </li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup text-center">
        <div class="container">
            <div class="py-4 mb-4">
                @include('partials.validation_errors')
                @inject('model' ,'App\Model\Client')

                {!! Form::model($model,[
                  'action' =>['Front\AuthController@profileSet',$model->id],
                  'method' => 'post',
                  'class'=> 'w-75 m-auto'
                  ])!!}
                {!! Form::text('name',auth()->user()->name, [
                'class' =>'form-control my-3',
                'name' => 'name' ,
                'placeholder' => 'name'
                ])!!}

                {!! Form::text('email' ,auth()->user()->email, [
                'class' =>'form-control my-3',
                'name' => 'email' ,
                'placeholder' => ' email'
                ])!!}

                {!! Form::date('dob' ,auth()->user()->d_o_b, [
                'class' =>'form-control my-3',
                'name' => 'dob' ,
                'placeholder' => 'birthday'
                ])!!}

                {!! Form::text('blood_type_id' ,auth()->user()->blood_type_id, [
                'class' =>'form-control my-3',
                'name' => 'blood_type_id' ,
                'placeholder' => ' blood type'
                ])!!}

                @inject('governorate','App\Model\Governorate')
                {!!  Form::select('governorate_id' ,$governorate->pluck('name','id')->toArray(),null,[
                 'class' => 'form-control my-3',
                 'id' => 'capital',
                 'name' => 'capital',
                 'placeholder' => 'choose Governorate'
                ]) !!}

                {!!  Form::select('city_id' ,[],null,[
                 'class' => 'form-control my-3',
                 'id' => 'city',
                 'name' => 'city_id',
                 'placeholder' => 'choose city'
                ]) !!}

                {!! Form::text('phone' ,auth()->user()->phone, [
                'class' =>'form-control my-3',
                'name' => 'phone' ,
                'placeholder'=> 'phone'
                ])!!}

                {!! Form::date('last_donation_date' ,auth()->user()->last_donation_date, [
                'class' =>'form-control my-3',
                'name' => 'last_donation_date' ,
                'placeholder'=>' Last Donation Date'
                ])!!}

                {!! Form::password('password', [
                'class' =>'form-control my-3',
                'name' => 'password',
                'placeholder'=> 'password'
                ])!!}

                {!! Form::password('password_confirmation' , [
                'class' =>'form-control my-3',
                'name' => 'rePass',
                'placeholder'=> '  Confirm Password '
                ])!!}
                <button type="submit" class="btn btn-success py-2 w-50">send</button>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            //event for change
            $("#capital").change(function(e){
                e.preventDefault();
                //get gov
                var governorate_id = $("#capital").val();
                if(governorate_id)
                {
                    //send ajax
                    $.ajax({
                        url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                        type : 'get',
                        success: function(data){
                            if(data.status==1)
                            {
                                $('#city').empty();
                                $("#city").append('<option value=""> اختر مدينة</option>')
                                $.each(data.data,function(index,city){
                                    $("#city").append('<option value="'+city.id+'">'+city.name+'</option>')
                                })
                                // console.log(data);
                            }
                        },
                        error: function(jqXhr, textStatus, errorMessage){
                            alert(errorMessage);
                        }
                    });
                }
                else{
                    $('#city').empty();
                    $("#city").append('<option value=""> اختر مدينة</option>')
                }
            });
        </script>
    @endpush
@endsection
