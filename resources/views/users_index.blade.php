@extends('layouts.services')

@section('content')
<h1>Site Users</h1>

@if(isset($name))
  {{ $name }} br />

@else
  No name given
@endif

{{ $name}} br />
{{ $email }} br />
{{ $admin }} br />
{{ $created_at}} br />
@endsection
