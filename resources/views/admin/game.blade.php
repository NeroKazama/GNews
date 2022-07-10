@extends('welcome')

@section('content')

    <component-forth :games="{{ json_encode($games)}}"></component-forth>

@endsection
