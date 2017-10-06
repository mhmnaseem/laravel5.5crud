@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif
@if($flash=session('message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{$flash}}
    </div>
@endif
