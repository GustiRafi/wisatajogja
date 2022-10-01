@extends('layouts.dashboard')
@section('dashboard')
@foreach($wisatas as $wisata)
<p>{{ $wisata->nama }}</p>
<p>{{ $wisata->image }}</p>
@endforeach
@endsection