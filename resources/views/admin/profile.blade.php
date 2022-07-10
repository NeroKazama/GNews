@extends('welcome')

@section('content')

    <component-second :users="{{ json_encode($users)}}" :games="{{ json_encode($games)}}"></component-second>

@endsection
