@if(count($errors) > 0)
  @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-dismissible" id="myAlert">
          <button type="button" class="close">&times;</button>
      {{$error}}
    </div>
  @endforeach
@endif


@if(session('success'))
    <div class="alert alert-success alert-dismissible" id="myAlert">
        <button type="button" class="close">&times;</button>
    {{session('success')}}
  </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissible" id="myAlert">
        <button type="button" class="close">&times;</button>
    {{session('error')}}
  </div>
@endif
