@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group list-group-flush">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
