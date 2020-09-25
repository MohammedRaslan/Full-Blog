<?php
namespace App\Http\Controllers;

use App;
use Session;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
/**
* Display a listing of the resource.
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $messages = App\Contact::all();
        return view('Backend.messages')->with([
        'messages'=>$messages,
        ]);
    }
/**
* Display a listing of the resource.
* @return \Illuminate\Http\Response
*/
    public function readMessage($id)
    {
        $message = App\Contact::find($id);
        return view('Backend.full-message')->with([
        'message'=>$message,
        ]);
    }
/**
* Delete Message.
*
* @param  $id
* @return \Illuminate\Http\Response
*/
    public function deleteMessage($id)
    {
        $response = false;
        $message = App\Contact::find($id);
        if($message->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
    }
/**
* Delete Message.
*
* @param  $id
* @return \Illuminate\Http\Response
*/
    public function sendMessage(Request $request)
    {
        $response = false;
        $this->validate($request, [
        'name' => 'required|string|max:255|min:4',
        'email' => 'required',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        ]);
        if (strstr($request->email, '@')){
       $message = App\Contact::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'subject'=> $request->subject,
        'message'=> $request->message,
        ]);
        $info = App\Info::find(1);
        $EmailTo = $info->email;
        $Subject = $request->subject;
        $message = $request->message;
    // send email
        //$success = mail($EmailTo, $Subject, $message);
        if($message){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
        }
    }
}
