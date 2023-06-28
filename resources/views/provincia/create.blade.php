
<div class="container">
    @include('layouts.navigation')
<!-- Latest compiled and minified CSS -->

<!-- Latest compiled and minified JavaScript -->

    <form action="{{ route('provincia.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('provincia.formProvincia');
    </form>

</div>
