@if( session('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {!! session('success') !!}
    </div>
@endif