<?php

namespace App\Http\Controllers;

use App;

use Session;

use Illuminate\Http\Request;


class SubscribersController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = App\Subscriber::all();
        return view('Backend.subscribers')->with([
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Add New subscriber To List.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSubscriber(Request $request)
    {
        $response = false;
        $this->validate($request, [
            'email' => 'required|unique:subscribers',
        ]);
        if (strstr($request->email, '@')){
            $response = true;
           $sub = App\Subscriber::create([
                'email'=> $request->email,
            ]);
            
        }
        if($sub){
            $response = true;
            echo json_encode($response);
                exit;
        }
        echo json_encode($response);
                exit;
      
    }

    /**
     * Delete Subscriber.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSubscriber($id)
    {
        $response = false;
        $subscriber = App\Subscriber::find($id);
        if($subscriber->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
    }
}
