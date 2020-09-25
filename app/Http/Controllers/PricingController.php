<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricing = App\Pricing::all();
        $pricingFeature = App\PricingFeature::all();
        $nav = App\Navbar::select('id','title','appear')->get();
        $home = App\HomePage::select('id','pricing')->get();
        return view('Backend.pricing')->with([
        'pricing'=>$pricing,
        'pricingFeature'=>$pricingFeature,
        'nav' => $nav[6],
        'home' => $home[0],
        ]);
    }

    public function changeNavStatus(Request $request)
    {
        
        $nav = App\Navbar::findOrFail($request->nav_id);
        $nav->appear = $request->status;
        $nav->save();
        return response()->json(['message' => 'Pricing status updated successfully.']);
    }


    public function changeHomeStatus(Request $request)
    {
        $home = App\HomePage::findOrFail(1);
        $home->pricing = $request->status;
        $home->save();
        return response()->json(['message' => 'Pricing status updated successfully.']);
    }

        /**
     * Get Edit Package Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPackageForm($id)
    {
        $package = App\Pricing::find($id);
        $features = App\PricingFeature::all()->where('package_id', $id);
        return view('Backend.edit-package')->with([
            'package'=>$package,
            'features'=>$features,
        ]);
    }

    /**
     * Update Package
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePackage(Request $request, $id)
    {
        $package = App\Pricing::find($id);
        $this->validate($request, [
                'title'=>'required|string|max:255',
                'icon'=>'required|string|max:255',
                'price'=>'required|string|max:255',
            ]);
        $package->title = $request->title;
        $package->icon = $request->icon;
        $package->price = $request->price;
        $package->save();
        Session::flash('success', 'Your Package has been updated successfully.');
        return redirect()->route('pricingpage');
    }

    /**
     * Update PackageFeature
     *
     * @return \Illuminate\Http\Response
     */
    public function editPackageFeature($id)
    {
        $package = App\Pricing::find($id);
        $features = App\PricingFeature::all()->where('package_id', $id);
        return view('Backend.edit-packagefeature')->with([
            'package'=>$package,
            'features'=>$features,
        ]);
    }

    /**
     * Update Package Feature
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePackageFeature(Request $request, $id)
    {
        $packagefeature = App\PricingFeature::find($id);

            $this->validate($request, [
                $id =>'string|max:255',
            ]);

            $packagefeature->name = $request->$id;

            $packagefeature->save();

        Session::flash('success', 'Your Feature Has Been Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Add Package Feature
     *
     * @return \Illuminate\Http\Response
     */

    public function addPackageFeature(Request $request, $package_id)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
            App\PricingFeature::create([
            'name' => $request->name,
            'package_id' => $package_id,
            ]);
            Session::flash('success', 'Your New Feature Package Had Been Added Successfully.');
            return redirect()->back();
    }

    /**
     * Delete Package.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePackage($id)
    {
        $response = false;
        $package = App\Pricing::find($id);
        if($package->delete()){
            $response =true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
    }

    /**
     * Delete Package Feature.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePackageFeature($id)
    {
        $package = App\PricingFeature::find($id);
        $package->delete();
        Session::flash('success', 'Your Feature Has been Deleted Successfully');
        return redirect()->back();
    }

        /**
     * Add a newly Package.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPackage(Request $request)
    {
        $response['status'] = false;
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);
         $package = App\Pricing::create([
            'title' => $request->title,
            'price' => $request->price,
            'icon' => $request->icon,
            ]);
            if($package){
                $response['status'] = true;
                $response['id'] = $package->id;
                $response['title'] = $package->title;
                $response['icon'] = $package->icon;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
            exit;
    }
}
