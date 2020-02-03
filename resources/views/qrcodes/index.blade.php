@if(count($qrs) > 0)
  @foreach($qrs as $qr)
   {{$qr->firstname}}
   {{$qr->lastname}}
   {{$qr->idnumber}}
  @endforeach
@endif