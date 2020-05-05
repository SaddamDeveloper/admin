@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>{{__('Restaurant List')}}</h5>
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
                        <table class="table table-striped dt-responsive nowrap" style="width:100%" id="restaurant_list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Restaurant Name</th>
                                <th>Email</th>
                                <th>Tagline</th>
                                <th>Action</th>
                                <th>Manage Menu</th>
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
            var table = $('#restaurant_list').DataTable({                
                iDisplayLength: 50,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.ajax.restaurant_list')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'restaurant_name', name: 'restaurant_name' ,searchable: true}, 
                    {data: 'email', name: 'email',searchable: true},           
                    {data: 'tagline', name: 'tagline',orderable: false, searchable: false},                    
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'menu', name: 'menu', orderable: false, searchable: false},
                ]
            });
            
        });
     </script>
    
 @endsection


