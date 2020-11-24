
@section('title', "| {{$post -> title}}")

@extends('layouts.app')

<!--@section('title', "| $post->title")-->

@section('content')
<div class="row">
  <div class="col-lg-4"></div>
    <div class="col-lg-8">
      <div class="post mt-3">
          <h3>{{ $post -> title }}</h3>
          <p>{{ $post -> post}}</p>
      </div>
      <hr>
      <div class="row">
          <div class="col-lg-8">
            <h3>Comments will be listed here once the bug is fixed.</h3>

          </div>
        </div>
      <hr>
    <div id="comment-form">
      <form data-parsley-validate method="POST" action="{{ action('CommentsController@store', $post-> id) }}">
        <div class="row">

            <div class="col-lg-8">
             <label class="mt-1" for="name">Name</label>
             <h3> <input class="form-control" id="name" name="name" type="textarea" required maxlength="255"></input></h3>
           </div>
            <div class="col-lg-8">
             <label class="mt-1" for="username">UserName</label>
             <h3> <input class="form-control" id="username" name="username" type="textarea" required maxlength="255"></input></h3>
           </div>
              <div class="col-lg-8">
           <label class="mt-1" for="email">Email</label>
           <h3><input class="form-control" id="email" name="email" type="textarea" required maxlength="255"></input></h3>
         </div>
               <div class="col-lg-12">
             <label class="mt-1" for="comment">Comment</label>
             <textarea rows="10" class="form-control" id="comment" name="comment" type="textarea"required minlength="5" maxlength="2000"></textarea>
          </div>
        <div class="col-lg-8">
          <div class="button" style="margin-top: 10px;">
            <button type="submit" class="btn btn-secondary btn-md m-1">Submit Comment</button>
          </div>
        </div>
        </div>
      </form>
    </div>
      </div>
  </div>
@endsection
