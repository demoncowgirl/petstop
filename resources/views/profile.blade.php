@extends('layouts.app')
<!-- @section('title', 'Profile') -->
@section('content')
<h1>Profile</h1>
<div id="profileForm" class="container">
  <form>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="username">Email</label>
      <input type="email" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="form-group col-md-6">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="first_name" placeholder="First name">
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Last Name</label>
      <input type="last_name" class="form-control" id="last_name" placeholder="Last name">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="street_address">Street Address</label>
    <input type="text" class="form-control" id="street_address" placeholder="Street address">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-2">
    <label for="family_size">Family Size</label>
    <select name="family_size">
      <option value="#" >1-2</option>
      <option value="#" >3-5</option>
      <option value="#" >6-9</option>
      <option value="#" >10 or more</option>
    </select>
    </div>
    <div class="form-group col-md-2">
    <label for="housing">Housing</label>
      <div class="checkbox">
        <label><input type="checkbox" value="own">Own</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="rent">Rent</label>
      </div>
      <div class="checkbox disabled">
        <label><input type="checkbox" value="other">Other</label>
      </div>
    </div>
    <div class="form-group col-md-2">
    <label for="fence">Fenced Yard?</label>
      <div class="checkbox">
        <label><input type="checkbox" value="yes">Yes</label>
      </div>
      <div class="checkbox">
        <label><input type="checkbox" value="no">No</label>
      </div>
    </div>

  <div class="form-group col-md-1">
    <label for="pet">Pets</label>
    <div class="checkbox">
      <label><input type="checkbox" value="dog">Dog</label><br>
      <label><input type="checkbox" value="cat">Cat</label><br>
      <label><input type="checkbox" value="bird">Bird</label><br>
      <label><input type="checkbox" value="horse">Horse</label>
    </div>
  </div>
    <div class="form-group col-md-3">
      <div class ="checkbox">
      <br>
      <label><input type="checkbox" value="barnyard">Barnyard</label><br>
      <label><input type="checkbox" value="reptile">Reptile</label><br>
      <label><input type="checkbox" value="smallfurry">Small Furry</label>
    </div>
  </div>
    <div class="form-group col-md-5 m-2">
      <form action="/action_page.php">
        <input type="file" name="pic" accept="image/*">
        <button type="submit" class="btn-sm btn-outline-secondary m-2 pull-left">Upload</button>
      </form>
    </div>
    <div class="form-group col-md-4">
      <button type="submit" class="btn btn-dark m-0 btn-md" style="center">Submit</button>
    </div>
    <div class="form-group col-md-2">
      <div id="retriever" class = "row">
      @include('inc._retriever_wagging')
      </div>
    </div>
  </div>


</div>
@endsection
