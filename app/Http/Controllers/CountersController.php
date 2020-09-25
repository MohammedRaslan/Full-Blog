<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class CountersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = App\Counter::all();
        $home = App\HomePage::select('id','counter')->get();
        return view('Backend.counter')->with([
        'counters'=>$counters,
        'home' => $home[0],
        ]);
    }

    public function changeHomeStatus(Request $request)
    {
        $home = App\HomePage::findOrFail(1);
        $home->counter = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }
    
           /**
     * Get Edit counter Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given counter
     * @return \Illuminate\Http\Response
     */
    public function editCounter($id)
    {
        $counter = App\Counter::find($id);
        return view('Backend.edit-counter')->with('counter', $counter);
    }

        /**
     * Update counter.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given counter
     * @return \Illuminate\Http\Response
     */
    public function updateCounter(Request $request, $id)
    {
        $counter = App\Counter::find($id);
        $request->validate([
        'title' => 'required|string|max:255',
        'number' => 'required|numeric',
        ]);
        $counter->title = $request->title;
        $counter->number = $request->number;
        $counter->save();
        Session::flash('success', 'Your Counter has been updated successfully.');
        return redirect()->route('counterspage');
    }

            /**
     * delete Counter.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function deleteCounter($id)
    {
        $response = false;
        $counter = App\Counter::find($id);
        if($counter->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
    }

           /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function addCounter()
    {
        return view('Backend.add-counter');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeCounter(Request $request)
    {
        $response['status'] = false;
        $request->validate([
            'title' => 'required|string|max:255',
            'number' => 'required|numeric',
            ]);
      $counter = App\Counter::create([
            'title' => $request->title,
            'number' => $request->number,
        ]);
        if($counter){
            $response['status'] = true;
            $response['id'] = $counter->id;
            $response['title'] = $counter->title;
            $response['number'] = $counter->number;
            echo json_encode($response);
            exit;
        }
            echo json_encode($response);
            exit;
    }
}
