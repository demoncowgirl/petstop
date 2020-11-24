@extends('layouts.services')

@section('content')
<!-- @section('title', 'Service Search') -->
<h1>Pet Services</h1>
  <div id="servicesList">
    <ul>
        <li><a class="{{ Request::is ('/vetServices') ? 'active': ''}}" href='/vetServices'><strong>Veterinary Clinics</strong></a></li>
        <li><a href='#'><strong>Emergency Services</strong></a></li>
        <li><a href='#'><strong>Animal Rescues</strong></a></li>
        <li><a href='#'><strong>Groomers</a></strong></li>
        <li><a href=#><strong>Pet Sitters & Kennels</strong></a></li>
        <li><a href=#><strong>Pet Supplies</strong></a></li>
    </ul>
  <p>Above are links that will allow you to search for a specific pet-oriented service provider. Once you are at that screen, you will be able to search for those providers in your area. Click on the links above to be redirected to a search page that will allow you to search by zip code.
  </p>
</div>
@endsection
@include('inc._footer')
