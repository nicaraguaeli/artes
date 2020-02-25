@extends('layout.layout')

@section('main')
@include('partial.header')

<div style="position: relative; top: 40vh;">
    
<div style="text-align: center;">
    <img width="300px;" src="{{asset('img/lg.jpg')}}" alt="">
</div>

@foreach ($errors->all() as $error)
            <script>
            	Android.showToast("{{ $error }}");
            </script>
              
            @endforeach
</div>

@endsection
