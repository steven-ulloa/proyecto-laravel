<h1>este es el create</h1>
<div class="container">
    @include('layouts.navigation')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('ciudad.formCiudad');
    </form>

</div>
