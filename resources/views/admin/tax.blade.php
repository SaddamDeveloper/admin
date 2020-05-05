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
                        {{ Form::open(array('route' => 'admin.add.tax', 'method' => 'post')) }}
                            <div class="form-group  row {{ $errors->has('tax') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('Tax*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tax" class="form-control" value="{{$tax_final}}">
                                    @if($errors->has('tax'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('tax') }}</strong>
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


