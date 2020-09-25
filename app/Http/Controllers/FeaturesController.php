<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = App\Feature::all();
        $why = App\Feature::find(1);
        $nav = App\Navbar::select('id','title','appear')->get();
        $home = App\HomePage::select('id','features')->get();
        return view('Backend.features')->with([
        'features'=>$features,
        'why'=>$why,
        'nav' => $nav[2],
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
        $home->features = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }
           /**
     * Get Edit feature Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function editFeature($id)
    {
        $feature = App\Feature::find($id);
        return view('Backend.edit-feature')->with('feature', $feature);
    }

        /**
     * Update Feature.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function updateFeature(Request $request, $id)
    {
        $feature = App\Feature::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            ]);
        $feature->title = $request->name;
        $feature->icon = $request->icon;
        $feature->save();
        Session::flash('success', 'Your Feature has been updated successfully.');
        return redirect()->route('featurespage');
    }

            /**
     * delete Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given feature
     * @return \Illuminate\Http\Response
     */
    public function deleteFeature($id)
    {
        $response = false;
        $feature = App\Feature::find($id);
        if($feature->delete()){
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
    public function addFeature()
    {
        return view('Backend.add-feature');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeFeature(Request $request)
    {
        $response['status'] = false;
          $this->validate($request,[
            'name' => 'required|string|max:255',
            'icon' => 'required|string',
            ]);
          
           $feature = App\Feature::create([
                'title' => $request->name,
                'icon' => $request->icon,
            ]);
        
     if($feature){
         $response['status'] = true;
         $response['id'] = $feature->id;
         $response['title'] = $feature->title;
         $response['icon'] = $feature->icon;
         echo json_encode($response);
         exit;
     }
     echo json_encode($response);
     exit;
    }
}
