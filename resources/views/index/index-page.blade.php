@extends('welcome')

@section('index')
    <index-page-vue :tasks="{{$tasks}}"/>
@endsection
