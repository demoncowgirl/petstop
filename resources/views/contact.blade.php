@extends('layouts.app')
@section('content')
<div class="container-fluid mx-auto">
    <div id="app" class="d-flex">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title">Contact</h1>
          <div id="contactForm" class="container-fluid" >
          <form action=/inputMessages method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label for="name">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Name">
            </div>

            <div class="form-group">
              <label for="email_address">Email</label>
                <input type="email-address" class="form-control" id="email_address" placeholder="Email">
            </div>

            <div class="form-group">
              <label for="message">Message</label>
                <textarea type="text" class="form-control" rows="8" id="message" placeholder="Type message here"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark m-0 btn" style="align-content: center">Submit</button>
                  @if (session('status'))
                <div class="alert alert-success" role="alert">
                {{ session('status') }}
                </div>
                @endif
            </div>
          </form>
        </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
