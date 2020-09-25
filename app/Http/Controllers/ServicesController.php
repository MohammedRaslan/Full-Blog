<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicesRequestValidation;

use App;

use Illuminate\Http\Request;

use Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = App\Service::all();
        $home = App\HomePage::select('id','services')->get();
        $nav = App\Navbar::select('id','title','appear')->get();
        return view('Backend.services')->with([
            'services'=>$services,
            'home' => $home[0],
            'nav' => $nav[3],
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
        $home->services = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }
    /**
     * Get Edit Service Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editServiceForm($id)
    {
        $service = App\Service::find($id);
        return view('Backend.edit-service')->with([
            'service'=>$service,
        ]);
    }

    /**
     * Update Service
     *
     * @return \Illuminate\Http\Response
     */
    public function updateService(ServicesRequestValidation $request, $id)
    {
        $service = App\Service::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/services/' . $service->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/services/', $imageName);
            $service->image = $imageName;
        }
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;
        $service->save();
        Session::flash('success', 'Your Service has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Service.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteService($id)
    {
        $response = false;
        $service = App\Service::find($id);
        unlink('uploads/services/' . $service->image);
        if($service->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
    }

        /**
     * Add a newly partner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addService(Request $request)
    {
        $response['status'] = false;
        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/services/', $new_name);

          $service =  App\Service::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $new_name,
            ]);
            if($service){
                $response['id'] = $service->id;
                $response['title'] = $service->title;
                $response['status'] = true;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
            exit;
        }
    }
}
