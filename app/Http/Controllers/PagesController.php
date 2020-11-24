<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function getHome() {
        return view('home');
    }
    public function getLogin() {
        return view('login');
    }
    // public function getRegister() {
    //     return view('register');
    // }
    // public function getLoginSuccessful() {
    //     return view('loginSuccessful');
    // }
    public function getAbout() {
        return view('about');
    }
    public function getContact() {
        return view('contact');
    }
    //need a get for profile information
    public function getProfile() {
        return view('profile');
    }
    public function getPetSearch() {
        return view('petSearch');
    }
    public function getPetServices() {
        return view('serviceSearch');
    }
    public function getVetServices() {
        return view('vetServices');
    }
    public function getKennels() {
        return view('kennels');
    }
    public function getGroomers() {
        return view('groomers');
    }
    public function getPetSupplies() {
        return view('petSupplies');
    }
    public function getMessages() {
        return view('messages');
    }
    public function getList() {
        return view('elliesList');
    }
    public function getLove() {
        return view('loveOurPets');
    }
    public function getUsers() {
        return view('users_index');
    }
    public function getBlog() {
        return view('blog');
    }
}
