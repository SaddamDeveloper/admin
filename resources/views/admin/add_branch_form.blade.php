@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Add Branch')}}</h5>
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
                        @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissable" >{{ Session::get('message') }}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">{{ Session::get('error') }}</div>
                        @endif
            
                        {{ Form::open(array('route' => 'admin.add.branch', 'method' => 'post')) }}
                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">{{__('Branch Name*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="br_name" class="form-control" placeholder="Enter Branch Name">
                                </div>
                                @if($errors->has('br_name'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('br_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">{{__('City/Town*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="city" placeholder="Enter City or Town">
                                </div>
                                @if($errors->has('city'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">{{__('Police Station*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ps" placeholder="Enter Police Station">
                                </div>
                                @if($errors->has('ps'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('ps') }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">{{__('Dist*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="dist" placeholder="Enter District">
                                </div>
                                @if($errors->has('dist'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('dist') }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group  row">
                                <label class="col-sm-2 col-form-label">{{__('Pin*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pin" placeholder="Enter Pin">
                                </div>
                                @if($errors->has('pin'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('pin') }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- <div class="hr-line-dashed"></div> --}}
                            <hr>
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>{{__('Owner Details')}}</h5>
                                </div>
                                <hr>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">{{__('First Name*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                                    </div>
                                    @if($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">{{__('Last Name*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                    </div>
                                    @if($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label"> {{__('Mobile*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mobile" placeholder="Mobile No">
                                    </div>
                                    @if($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>{{__('Branch Credentials')}}</h5>
                                </div>
                                <hr>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label">{{__('Email*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email adrress">
                                    </div>
                                    @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label"> {{__('Password*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                    @if($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group  row">
                                    <label class="col-sm-2 col-form-label"> {{__('Confirm Password*')}}</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
                                    </div>
                                    @if($errors->has('confirm_password'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
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


