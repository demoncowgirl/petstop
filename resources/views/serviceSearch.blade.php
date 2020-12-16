@extends('layouts.services')

@section('content')
<!-- @section('title', 'Service Search') -->
<div class="container-fluid mx-auto">
  <div id="servicesList" class="d-flex">
    <div class="row">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title">Pet Services</h1>
          <div class="card-text">
          <div class="list">
          <ul>
            <li><a class="{{ Request::is ('/vetServices') ? 'active': ''}}" href='/vetServices'><strong>Veterinary Clinics</strong></a></li>
            <li><a href='#'><strong>Emergency Services</strong></a></li>
            <li><a href='#'><strong>Animal Rescues</strong></a></li>
            <li><a href='#'><strong>Groomers</a></strong></li>
            <li><a href=#><strong>Pet Sitters & Kennels</strong></a></li>
            <li><a href=#><strong>Pet Supplies</strong></a></li>
          </ul>
        </div>
      </div>
      <p>Above are links that will allow you to search for a specific pet-oriented service provider. Once you are at that screen, you will be able to search for those providers in your area. Click on the links above to be redirected to a search page that will allow you to search by zip code.
  </p>
      </div>
    </div>
  </div>
<!-- <div id="pets" class="image">
  <img src="{{ asset('assets/images/piccolo.jpg') }}">
</div> -->
</div>
</div>
@endsection
