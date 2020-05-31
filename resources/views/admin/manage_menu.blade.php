@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        @if(isset($fetch_restaurant) && !empty($fetch_restaurant))
                        <h5>{{__('Manage Menu for ').$fetch_restaurant->restaurant_name}}</h5>
                        @endif
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
                        <input type="hidden" name="restaurantId" value="{{$fetch_restaurant->id}}">
                        <a href="{{route('admin.add.menu', ['restaurantId' => encrypt($fetch_restaurant->id)])}}" class="btn btn-success pull-right">Add Menu</a>
                        <table class="table table-striped dt-responsive nowrap" style="width:100%" id="menu_list">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
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
            var table = $('#menu_list').DataTable({                
                iDisplayLength: 50,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.ajax.menu_list')}}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name' ,searchable: true}, 
                    {data: 'description', name: 'description' ,searchable: true}, 
                    {data: 'status', name: 'status', render:function(data, type, row){
                      if (row.status == '1') {
                        return "<button class='btn btn-info'>Active</a>"
                      }else{
                        return "<button class='btn btn-danger'>Deactive</a>"
                      }                        
                    }},                     
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
            
        });
     </script>
    
 @endsection


