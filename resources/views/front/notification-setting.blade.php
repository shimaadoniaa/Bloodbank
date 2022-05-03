@extends('front.master')
@section('content')

    <div class="container">
        <!--Breadcrumb-->
        <nav class="my-4" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">home</a></li>
                <li class="breadcrumb-item active" aria-current="page">notification settings</li>
            </ol>
        </nav><!--End Breadcrumb-->
    </div><!--End container-->
    <section class="signup">
        <div class="container">
            <div class="py-4 mb-4"> {{$settings->notification_content}}</div>
        </div>
        <div class="container">
            <div class="py-4 mb-4 text-center">
                @include('partials.validation_errors')
                @inject('gov',App\Model\Governorate)
                @inject('bloodtype',App\Model\BloodType)
                @inject('model' ,App\Model\Client)

                {!! Form::model($model,[
                  'action' =>'Front\AuthController@updateNotificationSettings',
                  'method' => 'post',
                  'class'=> 'w-75 m-auto'
                  ])!!}
                <h3>Gavernorate</h3><br>


                <div class="form-group">
                    <div class="row">
                        @foreach($gov->all() as $governorate)
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="governorates[]"
                                               value="{{$governorate->id}}"
                                               @if(auth()->user()->governorate->contains($governorate->id))
                                               checked
                                            @endif> {{$governorate->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <h3>Blood Types</h3><br>

                <div class="form-group">
                    <div class="row">
                        @foreach($bloodtype->all() as $blood_type)
                            <div class="col-sm-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="bloodtypes[]"
                                               value="{{$blood_type->id}}"
                                               @if(auth()->user()->bloodTypes->contains($blood_type->id))
                                               checked
                                            @endif > {{$blood_type->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success py-2 w-50">تعديل</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </section>

@endsection
