
  @foreach($vscanqrs as $vscanqr)
    {{$vscanqr->qrmsg}}
    {{$vscanqr->qrurl}}
    {{$vscanqr->qraction}}
@endforeach