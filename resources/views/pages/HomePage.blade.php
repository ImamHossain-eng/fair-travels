@extends('layouts.home')
@section('content')
<!--Slider start-->
@include('parts.slider')
<div style="background-color:#212121; color: #EFEFEF; padding: .5em;">
    <div class="container">
        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5" vspace="2px">
            @foreach($exchanges as $ex)
                @if($loop->first) <i class="fa fa-arrow-right"></i> @endif
                {{$ex->name}} ({{$ex->short_form}}) <i class="fa fa-usd"></i> {{$ex->rate}}
                @if($loop->last) <i class="fa fa-arrow-left"></i> @else | @endif
            @endforeach
        </marquee>
    </div>
</div>
<!--Services-->
@include('parts.services')

<!--Packages-->
@include('parts.packages')

<!--Contact-->
@include('parts.contact')

@endsection