<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


use App;

use Session;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = App\Info::find(1);
        $about = App\About::find(1);
        $mapInfo =App\Map::find(1);
        $skills = App\Skill::all();
        $nav = App\Navbar::select('id','title','appear')->get();
        return view('Backend.about')->with([
            'about'=>$about,
            'skills'=>$skills,
            'info'=>$info,
            'mapInfo' => $mapInfo,
            'nav' => $nav[1],
        ]);
    }

    public function changeStatus(Request $request)
    {
        
        $nav = App\Navbar::findOrFail($request->nav_id);
        $nav->appear = $request->status;
        $nav->save();
        return response()->json(['message' => 'About status updated successfully.']);
    }

    /**
     * Update History.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateHistory(Request $request)
    {
        $response = false;
        $History = App\About::find(1);
        $request->validate([
            'history' => 'required|string',
            ]);
        $History->history = $request->history;
        if($History->save()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
    }

        /**
     * Update Mission.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateMission(Request $request)
    {
        $response = false;
        $mission = App\About::find(1);
        $request->validate([
            'mission' => 'required|string',
            ]);
        $mission->mission = $request->mission;
        if($mission->save()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        
        echo json_encode($response);
            exit;
    }

        /**
     * Update Vision.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateVision(Request $request)
    {
        $response = false;
        $vision = App\About::find(1);
        $request->validate([
            'vision' => 'required|string',
            ]);
        $vision->vision = $request->vision;
        if($vision->save()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        
        echo json_encode($response);
            exit;
    }

           /**
     * Get Edit Skill Form.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function editSkill($id)
    {
        $skill = App\Skill::find($id);
        return view('Backend.edit-skill')->with('skill', $skill);
    }

        /**
     * Update Skill Name.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function updateSkill($id, $name, $perc)
    {
        
        $response = false;
        $skill = App\Skill::find($id);
        $request->validate([
            'name' => 'string|max:255',
            'pourcentage' => 'numeric',
            ]);
        $skill->name = $name;
        $skill->pourcentage = $perc;
        if($skill->save()){
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
    public function addSkill()
    {
        return view('Backend.add-skill');
    }

            /**
     * Add Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function storeSkill(Request $request)
    {
        $response['status'] = false;
        $request->validate([
            'name' => 'string|max:255',
            'pourcentage' => 'numeric'
            ]);
       $skill = App\Skill::create([
            'name' => $request->name,
            'pourcentage' => $request->pourcentage,
        ]);
        if($skill){
            $response['status'] = true;
            $response['name'] = $request->name;
            $response['pourcentage'] = $request->pourcentage;
            $response['id'] = $skill->id;
            echo json_encode($response);
            exit;
        }

        echo json_encode($response);
        exit;
    }

            /**
     * delete Skill.
     *
     * @param  \Illuminate\Http\InfosRequestValidation  $request
     * @param $id of given skill
     * @return \Illuminate\Http\Response
     */
    public function deleteSkill($id)
    {
        $response = false;
        $skill = App\Skill::find($id);
        if($skill->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
    }

        /**
     * Update Logo.
     *
     * @param  \Illuminate\Http\MetasRequestValidation  $request
     * @return \Illuminate\Http\Response
     */
    public function updateLogo(Request $request)
    {
        $response = false;
        $logoAbout = App\About::find(1);
        $request->validate([
            'logo' => 'required|image'
            ]);
        if (!empty($request->file('logo'))) {
            if(File::exists('uploads/' . $logoAbout->logo)){
                unlink('uploads/' . $logoAbout->logo);
            }
            $logoNew = time() . $request->file('logo')->getClientOriginalName();
            $request->logo->move('uploads/', $logoNew);
            $logoAbout->logo = $logoNew;
        }
        if($logoAbout->save()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
       
    }
}
