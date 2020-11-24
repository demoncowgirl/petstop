<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveMsgsController extends Controller
{
    public function index($id){

        $messages = Message::where('id', $id)->get();

        $messagesData = []

        foreach($messages as $key){
          $user = User::find($key->id);
          $name = $user ->name;
          $messages = $this->message($key->id);
        }
        if($message){
          array_push($commentsData,[
            "name"=> $name,
            "email"=> $email,
            "message"=> $message,
            "date" => $key->created_at-toDateTimeString()
        ]);
      }
        $collection = collect($messages);
        return $collection->sortby('date');
    }
}
