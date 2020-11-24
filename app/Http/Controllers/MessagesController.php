<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller

{
    public function inputMessages(Request $request){

      $this->validate($request, [
        'name' => 'required',
        'email_address' => 'required',
        'message' => 'required'
      ]);

      // $message = Message::create($request->all());
      // if($message)
      //   return ["status" => "true", "messageId" => $id ];

      $name -> name = $request -> inputMessages('name');
      $email -> email = $request -> inputMessages('email');
      $message -> message = $request -> inputMessages('message');
      $request -> session() -> flash('status', 'Message submitted. Thank you!');

      // $data = array('name'=>$name, 'emal'=> $email, 'message'=> $message);

      // DB::messages->inputMessages($data);

    }

}
?>
