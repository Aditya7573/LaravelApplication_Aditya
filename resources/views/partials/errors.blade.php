@if($errors->any())
    @foreach($errors->all() as $error)
        {{ $error  }}<br>
    @endforeach
@endif


