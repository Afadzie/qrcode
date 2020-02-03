@extends('layout.app')
@section('content')
<div class="text-center">
<form class="form-inline" action="/save" method="post">
  @csrf
    <div class="form-group">
      <label>Scan Qr</label>
      <input type="text" name="zscanqr" class="form-control" >
    </div>
    <!--<button type="submit" class="btn btn-success">Scan</button>-->
  </form>
</div>


@endsection