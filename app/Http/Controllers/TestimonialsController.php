<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class TestimonialsController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = App\Testimonial::all();
        $nav = App\Navbar::select('id','title','appear')->get();
        $home = App\HomePage::select('id','testimonials')->get();
        return view('Backend.testimonials')->with([
            'testimonials' => $testimonials,
            'nav' => $nav[7],
            'home' => $home[0],
        ]);
    }

    public function changeNavStatus(Request $request)
    {
        
        $nav = App\Navbar::findOrFail($request->nav_id);
        $nav->appear = $request->status;
        $nav->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }


    public function changeHomeStatus(Request $request)
    {
        $home = App\HomePage::findOrFail(1);
        $home->Testimonials = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }

    /**
     * Show Edit testimonial Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editTestimonialForm($id)
    {
        $testimonial = App\Testimonial::find($id);
        return view('Backend.edit-testimonial')->with('testimonial', $testimonial);
    }

    /**
     * Update Testimonial
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = App\Testimonial::find($id);
        $this->validate($request, [
                'name'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'feedback'=>'required|string',
                'image'=>'image',
            ]);
        if (!empty($request->file('image'))) {
            unlink('uploads/testimonials/' . $testimonial->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/testimonials/', $imageName);
            $testimonial->image = $imageName;
        }
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->feedback = $request->feedback;
        $testimonial->save();
        Session::flash('success', 'Your testimonial has been updated successfully.');
        return redirect()->route('testimonialspage');
    }

    /**
     * Delete Testimonial.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestimonial($id)
    {   
        $response = false;
        $testimonial = App\Testimonial::find($id);
        unlink('uploads/testimonials/' . $testimonial->image);
        if($testimonial->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
    }

        /**
     * Add a newly Partner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTestimonial(Request $request)
    {
        $response['status'] = false;
        $this->validate($request, [
            'name'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'feedback'=>'required|string',
                'image'=>'image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/testimonials/', $new_name);
           $test = App\Testimonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'feedback' => $request->feedback,
            'image' => $new_name,
            ]);
            if($test){
                $response['status'] = true;
                $response['id'] = $test->id;
                $response['name'] = $test->name;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
            exit;
        }
    }
}
