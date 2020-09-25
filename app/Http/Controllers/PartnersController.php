<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = App\Partner::all();
        $home = App\HomePage::select('id','partners')->get();
        return view('Backend.partners')->with([
        'partners'=>$partners,
        'home' => $home[0],

        ]);
    }

    public function changeHomeStatus(Request $request)
    {
        $home = App\HomePage::findOrFail(1);
        $home->partners = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }

    /**
     * Get Edit Partner Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPartnerForm($id)
    {
        $partner = App\Partner::find($id);
        return view('Backend.edit-partner')->with([
            'partner'=>$partner,
        ]);
    }

    /**
     * Update Partner
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePartner(Request $request, $id)
    {
        $partner = App\Partner::find($id);
        $this->validate($request, [
                'logo'=>'image',
                'name'=>'required|string|max:255',
            ]);
        if (!empty($request->file('logo'))) {
            unlink('uploads/partners/' . $partner->logo);
            $logoName = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/partners/', $logoName);
            $partner->logo = $logoName;
        }
        $partner->name = $request->name;
        $partner->save();
        Session::flash('success', 'Your Partner has been updated successfully.');
        return redirect()->route('partnerspage');
    }

    /**
     * Delete Partner.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePartner($id)
    {
        $response = false;
        $partner = App\Partner::find($id);
        unlink('uploads/partners/' . $partner->logo);
        if($partner->delete()){
            $response =true;
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
    public function addPartner(Request $request)
    {
        $response['status'] = false;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'logo' => 'required|image',
        ]);

        if (!empty($request->logo)) {
            $new_name = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/partners/', $new_name);
            $partner = App\Partner::create([
            'name' => $request->name,
            'logo' => $new_name,
            ]);
            if($partner){
                $response['status'] = true;
                $response['id'] = $partner->id;
                $response['name'] = $partner->name;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
                exit;
        }
    }
}
