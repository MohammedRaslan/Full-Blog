<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class SliderController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = App\Slider::all();
        $home = App\HomePage::select('id','slider')->get();
        
        return view('Backend.slider')->with([
            'sliders' => $sliders,
            'home' => $home[0],
        ]);
    }


    public function changeStatus(Request $request)
    {
        
        $home = App\HomePage::findOrFail(1);
        $home->slider = $request->status;
        $home->save();
        return response()->json(['message' => 'About status updated successfully.']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlider()
    {
        return view('Backend.slider-add');
    }

    /**
     * Store a newly slider.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlider(Request $request)
    {
        $respose = false;
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/slider/', $new_name);
            $slider =  App\Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $new_name,
            ]);
            if($slider){
                $respose = true;
                echo json_encode($respose);
                exit;
            }
            echo json_encode($respose);
                exit;
        }
    }

    /**
     * Show Edit Slider Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editSlider($id)
    {
        $slider = App\Slider::find($id);
        return view('Backend.edit-slider')->with('slider', $slider);
    }

    /**
     * Update Slider.
     *
     * @param  $id
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateSlider(Request $request, $id)
    {
        $slider = App\Slider::find($id);
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
        ]);
        if (!empty($request->file('image'))) {
            unlink('uploads/slider/' . $slider->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/slider/', $imageName);
            $slider->image = $imageName;
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        Session::flash('success', 'Your Slider Has been Updated Successfully');
        return redirect()->route('sliderpage');
    }

    /**
     * Delete Slider.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSlider($id)
    {
        $respose = false;
        $slider = App\Slider::find($id);
        unlink('uploads/slider/' . $slider->image);
        if($slider->delete()){
            $respose = true;
            echo json_encode($respose);
            exit;
        }
        echo json_encode($respose);
        exit;
    }
}
