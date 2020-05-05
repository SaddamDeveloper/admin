@if (Session::has('message'))
    <div class="alert alert-success alert-dismissable mt-2">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
        {{ Session::get('message') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissable mt-2"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button> 
        {{ Session::get('error') }}
    </div>
@endif