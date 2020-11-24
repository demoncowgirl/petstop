
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title', '| Blog')

@extends('layouts.app')

@section('content')
<div class="col-lg-12">
  <div class= "d-flex flex-row">
    <div class="col-lg-2"></div>
    <div class="col-lg-7">
      <h1>Blog Posts</h1>
      <div class="post mt-3">
      @foreach($posts as $post)
        <h3 style="font-family: GoodDog;">{{ $post -> title}}</h3>
      </p>{{ substr($post -> post, 0, 300)}}{{ strlen($post -> post) > 300 ? "..." : ""}}</p>
          <a href="{{ url('single/'.$post -> slug)}}" class="btn btn-sm btn-secondary">Read more</a>
        <hr>
      @endforeach
      </div>
    </div>
    <div class="col-md-3">
    <!-- @include('inc._verticalSlides') -->
  </div>
  </div> <!-- end of row -->
</div> <!-- end of grid -->
@endsection
