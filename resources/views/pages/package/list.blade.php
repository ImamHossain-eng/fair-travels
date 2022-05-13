@extends('layouts.home')
@section('content')
@include('parts.packages')
<br>
{{$packages->links()}}
@endsection