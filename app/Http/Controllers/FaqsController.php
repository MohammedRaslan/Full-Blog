<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = App\Faq::all();
        $nav = App\Navbar::select('id','title','appear')->get();
        $home = App\HomePage::select('id','faq')->get();
        return view('Backend.faqs')->with([
        'faqs'=>$faqs,
        'nav' => $nav[9],
        'home' => $home[0],
        ]);
    }

    public function changeNavStatus(Request $request)
    {
        
        $nav = App\Navbar::findOrFail($request->nav_id);
        $nav->appear = $request->status;
        $nav->save();
        return response()->json(['message' => 'Faqs status updated successfully.']);
    }


    public function changeHomeStatus(Request $request)
    {
        $home = App\HomePage::findOrFail(1);
        $home->faq = $request->status;
        $home->save();
        return response()->json(['message' => 'Faqs status updated successfully.']);
    }

    /**
     * Get Edit Faq Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editFaqsForm($id)
    {
        $faq = App\Faq::find($id);
        return view('Backend.edit-faq')->with([
            'faq'=>$faq,
        ]);
    }

     /**
     * Update Service
     *
     * @return \Illuminate\Http\Response
     */
    public function updateFaqs(Request $request, $id)
    {
        $faq = App\Faq::find($id);
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            ]);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Session::flash('success', 'Your Faq has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Service.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFaqs($id)
    {
        $response = false;
        $faq = App\Faq::find($id);
        if($faq->delete()){
            $response = true;
           echo json_encode($response);
           exit;
        }
        echo json_encode($response);
        exit;
    }

        /**
     * Add a newly slider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFaqs(Request $request)
    {
        $response['status'] = true;
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            ]);

         $faq = App\Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
            if($faq){
                $response['id'] = $faq->id;
                $response['question'] = $faq->question;
                $response['status'] = true;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
                exit;
    }
}
