@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Add Restaurant')}}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">{{__('Edit')}}</a>
                                </li>
                                <li><a href="#" class="dropdown-item">{{__('Delete')}}</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                       
                    </div>
                    <div class="ibox-content">
                        {{ Form::open(array('route' => 'admin.add.restaurant', 'method' => 'post')) }}
                            <div class="form-group  row {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Restaurant Name*')}}</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Restaurant Name">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">{{__('Tagline')}}</label>
                                <div class="col-sm-4">
                                    <input type="text" name="tagline" class="form-control" value="{{old('tagline')}}" placeholder="Enter Restaurant Tagline">
                                    @if($errors->has('tagline'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('tagline') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Phone*')}}</label>
                                <div class="col-sm-4">
                                    <input type="phone" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Enter Phone No">
                                    @if($errors->has('phone'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">{{__('Email*')}}</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter Email">
                                    @if($errors->has('email'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row {{ $errors->has('speciality') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Speciality*')}}</label>
                                <div class="col-sm-4">
                                    <input type="speciality" class="form-control" name="speciality" value="{{old('speciality')}}" placeholder="Enter Speciality">
                                    @if($errors->has('speciality'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">{{__('Range (in KM)*')}}</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="range" value="{{old('range')}}" placeholder="Enter Service Range">
                                    @if($errors->has('range'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('range') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row {{ $errors->has('state') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('State*')}}</label>
                                <div class="col-sm-4">
                                    @if(isset($state) && !empty($state))
                                    <select name="state" id="state" class="form-control">
                                        <option disabled selected>--Select State--</option>
                                        @foreach($state as $states)
                                            <option value="{{$states->id}}">{{$states->state}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    @if($errors->has('state'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">{{__('City*')}}</label>
                                <div class="col-sm-4">
                                    @if(isset($city) && !empty($city))
                                    <select name="city" id="city" class="form-control">
                                        <option disabled selected>--Select City--</option>
                                        @foreach($city as $citys)
                                            <option value="{{$citys->id}}">{{$citys->city}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    @if($errors->has('range'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('range') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Password')}}</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    @if($errors->has('password'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label class="col-sm-2 col-form-label">{{__('Confirm Password')}}</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                                    @if($errors->has('password'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                           
                            <div class="form-group row">
                                <div class="col-sm-12 col-sm-offset-2">
                                    {{ Form::submit('Submit', array('class'=>'btn btn-primary pull-right')) }}  
                                </div>
                            </div>
                            {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection 


