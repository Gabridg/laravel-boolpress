@if(session('message'))
<div class="container font-weight-bold">
    <div class="alert-{{ session('type') ?? 'info' }}">
        {{ session('message') }}
    </div>
</div>

@endif