<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class TeamsController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = App\Team::all();
        $nav = App\Navbar::select('id','title','appear')->get();
        $home = App\HomePage::select('id','team')->get();
        return view('Backend.team')->with([
            'teams' => $teams,
            'nav' => $nav[5],
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
        $home->team = $request->status;
        $home->save();
        return response()->json(['message' => 'Feature status updated successfully.']);
    }

    /**
     * Show Edit team Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editTeamForm($id)
    {
        $member = App\Team::find($id);
        return view('Backend.edit-team')->with('member', $member);
    }

    /**
     * Update Team Member
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTeam(Request $request, $id)
    {
        $member = App\Team::find($id);
        $this->validate($request, [
                'fname'=>'required|string|max:70',
                'lname'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'image'=>'image',
                'facebook'=>'required|url',
                'twitter'=>'required|url',
                'instagram'=>'required|url',
                'linkedin'=>'required|url',
            ]);
        if (!empty($request->file('image'))) {
            unlink('uploads/team/' . $member->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/team/', $imageName);
            $member->image = $imageName;
        }
        $member->fname = $request->fname;
        $member->lname = $request->lname;
        $member->position = $request->position;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->linkedin = $request->linkedin;
        $member->save();
        Session::flash('success', 'Your Team Member has been updated successfully.');
        return redirect()->route('teampage');
    }

    /**
     * Delete Team Member.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTeam($id)
    {
        $response = false;
        $member = App\Team::find($id);
        unlink('uploads/team/' . $member->image);
        if($member->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
            exit;
    }

            /**
     * Add a newly Team Member.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTeam(Request $request)
    {
        $response['status'] = false;
        $this->validate($request, [
                'fname'=>'required|string|max:70',
                'lname'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'image'=>'image',
                'facebook'=>'required',
                'twitter'=>'required',
                'instagram'=>'required',
                'linkedin'=>'required',
            ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/team/', $new_name);
          $team =  App\Team::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'position' => $request->position,
            'image' => $new_name,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            ]);
            if($team){
                $response['status'] = true;
                $response['id'] = $team->id;
                $response['fname'] = $team->fname;
                $response['lname'] = $team->lname;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
                exit;
        }
    }
}
