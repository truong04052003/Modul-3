@if (Session::has('success'))
    <p class="text-success">
        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
    </p>
@endif