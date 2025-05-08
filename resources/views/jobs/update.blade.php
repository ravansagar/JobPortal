@extends('layouts.base')

@section('content')
@auth
    <livewire:update-job :id="$id" />
    @livewire('add-tag')
@endauth
@endsection