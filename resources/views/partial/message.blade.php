@if(session()->has('message'))
    <div class="alert alert-{{ session()->get('type') }} alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
@endif