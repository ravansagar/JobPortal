@extends('layouts.base')

@section('content')
@auth
    @livewire('create-job')
    @livewire('add-tag')
@endauth
@endsection