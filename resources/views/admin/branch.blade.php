@extends('admin.template.admin_master')
@section('content')
<div class="wrapper wrapper-content">
    <a href="{{route('admin.add_branch')}}" class="btn btn-primary m-t">{{__('Add Branch')}}</a>
    <div class="table-responsive">
        <table id="branch-list" class="table table-striped table-bordered table-hover dataTables-example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Branch Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Owner Name</th>
                    <th>Register Date</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection 

@section('script')
     <script type="text/javascript">
         $(function () {
            var table = $('#branch-list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.ajax.branch_list') }}",
                columns: [
                    {data: 'id', name: 'id',searchable: true},
                    {data: 'epin', name: 'epin',searchable: true},
                    {data: 'status', name: 'status', render:function(data, type, row){
                      if (row.status == '1') {
                        return "<button class='btn btn-info'>Used</a>"
                      }else{
                        return "<button class='btn btn-danger'>Not Used</a>"
                      }                        
                    }},
                    {data: 'name', name: 'name' ,searchable: true}, 
                    {data: 'used_by', name: 'used_by' ,searchable: true},                 
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
            
        });
     </script>
     @endsection

