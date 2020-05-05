@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Edit Restaurant')}}</h5>
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
                        {{ Form::open(array('route' => 'admin.update.restaurant', 'method' => 'post')) }}
                            <input type="hidden" name="restaurantId" value="{{$single_restaurant->id}}">
                            <div class="form-group  row {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Restaurant Name*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="{{$single_restaurant->restaurant_name}}" placeholder="Enter Restaurant Name">
                                    @if($errors->has('name'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="hr-line-dashed">

                            </div>
                            <div class="form-group  row {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Email')}}</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="{{$single_restaurant->email}}" placeholder="Enter Email or Phone">
                                    @if($errors->has('email'))
                                    <span style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="hr-line-dashed">

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-sm-offset-2">
                                    {{ Form::submit('Update', array('class'=>'btn btn-primary pull-right')) }}  
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


