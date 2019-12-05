@extends('layouts.app');

@section('content')
    @foreach ($userData as $udata)
    <ul>
        <li> <strong>{{ $udata->title }}</strong> = {{ $udata->description }}</li>
    </ul>
    @endforeach
@endsection