@extends('layout.app')
@section('content')
<div class="text-center">
<form class="form-inline" action="{{route('newcreateqr.store')}}" method="post">
  @csrf
    <div class="form-group">
      <label>Name of QR Code</label>
      <input type="text" name="qrname" class="form-control" >
      <input type="hidden" name="qraction" class="form-control" value="0">
    </div>
    <div class="form-group">
      <label >Amount ot QR Codes</label>
      <input type="number" name="qramount" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection