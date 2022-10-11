@extends('template.officer')

@section('main', 'active',)

@section('textpage', 'หน้าแรก')
    
@section('content')
@include('template.main',[
    'col1' => 'col-md-7 mx-auto',
    'col2' => 'col-md-5 mx-auto'
]) 
@endsection