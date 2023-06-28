@include('layouts.navigation')
    <div class="container">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <form id="myForm" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('user.form');
        </form>
    </div>

