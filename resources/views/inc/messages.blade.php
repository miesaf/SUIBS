@if ($errors->any())
    <div class="container"><div class="row justify-content-center"><div class="col-md-10">
        <br />
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div></div></div>
@endif

@if (session('success'))
    <div class="container"><div class="row justify-content-center"><div class="col-md-10">
        <br />
        <div class="alert alert-success">{{ session('success') }}</div>
    </div></div></div>
@endif
