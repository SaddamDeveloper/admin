@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Add City')}}</h5>
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
                        {{ Form::open(array('route' => 'admin.add.city', 'method' => 'post')) }}
                            <div class="form-group  row {{ $errors->has('city') ? 'has-error' : 'has-success' }}">
                                <label class="col-sm-2 col-form-label">{{__('City*')}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="city" class="form-control" value="{{old('city')}}">
                                    @if($errors->has('city'))
                                        <span style="color:red;">
                                            <strong>{{ $errors->first('city') }}</strong>
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
                    <div class="ibox-content">
                        <table class="table table-striped dt-responsive nowrap" style="width:100%" id="city_list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection 

@section('script')
     <script type="text/javascript">
         $(function () {
            var table = $('#city_list').DataTable({                
                iDisplayLength: 50,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.ajax.city_list')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'city', name: 'city' ,searchable: true}, 
                    {data: 'status', name: 'status', render:function(data, type, row){
                      if (row.status == '1') {
                        return "<button class='btn btn-info'>Used</a>"
                      }else{
                        return "<button class='btn btn-danger'>Not Used</a>"
                      }                        
                    }},                     
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            
        });
     </script>
    
 @endsection


