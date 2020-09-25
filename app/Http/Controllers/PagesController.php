<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = App\Page::all();
        return view('Backend.pages')->with([
        'pages'=>$pages,
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function addNewPage()
    {
        return view('Backend.add-page');
    }

        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPage(Request $request)
    {
        $response['status'] = false;
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
        ]);

        $page = App\Page::create([
            'title' => $request->title,
            'content' => $request->content,
            ]);
            if($page){
                $response['status'] = true;
                $response['id'] = $page->id;
                $response['title'] = $page->title;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
                exit;
    }

    /**
     * Get Edit Page Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPage($id)
    {
        $page = App\Page::find($id);
        return view('Backend.edit-page')->with([
            'page'=>$page,
        ]);
    }

        /**
     * Update Page
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePage(Request $request, $id)
    {

        $this->validate($request, [
            'title'=>'required|string|max:255',
            'content'=>'required|string',
            ]);

        $page = App\Page::find($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();
        Session::flash('success', 'Your Page has been updated successfully.');
        return redirect()->route('pagespage');
    }

    /**
     * Delete Post.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePage($id)
    {
        $page = App\Page::find($id);
        $page->delete();
        Session::flash('success', 'Your Page Has been Deleted Successfully');
        return redirect()->route('pagespage');
    }
}
