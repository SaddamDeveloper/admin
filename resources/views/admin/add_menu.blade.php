@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Add Menu')}}</h5>
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
                            <a class="close-link" onclick="javascript:window.close()">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                       
                    </div>
                    <div class="ibox-content">
                        {{ Form::open(array('route' => 'admin.store.menu', 'method' => 'post')) }}
                        <input type="hidden" name="restaurantId" value="{{$fetch_restaurant->id}}">
                        <div class="form-group  row {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
                            <label class="col-sm-2 col-form-label">{{__('Menu Name*')}}</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Menu Name">
                                @if($errors->has('name'))
                                    <span style="color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  row {{ $errors->has('description') ? 'has-error' : 'has-success' }}">
                            <label class="col-sm-2 col-form-label">{{__('Description*')}}</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" value="{{old('description')}}" placeholder="Enter Description">
                                @if($errors->has('description'))
                                    <span style="color:red;">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-sm-offset-2">
                                {{ Form::submit('Add Menu', array('class'=>'btn btn-primary pull-right')) }}  
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


