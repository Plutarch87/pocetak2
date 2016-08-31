@if (Session::has('flash_message'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('flash_message') }}
    </div>
@elseif (Session::has('flash_error'))
    <div class="alert alert-danger">
        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('flash_error') }}
    </div>
@endif
