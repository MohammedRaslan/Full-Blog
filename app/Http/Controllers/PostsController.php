<?php

namespace App\Http\Controllers;

use App;

use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = App\Post::all();
        return view('Backend.posts')->with([
        'posts'=>$posts,
        ]);
    }

        /**
     * Add a new project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPost(Request $request)
    {
        $response['status'] = false;
        $this->validate($request, [
            'title'=>'required|string|max:255',
            'post'=>'required|string',
            'image'=>'required|image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/blog/', $new_name);
       $post = App\Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'image' => $new_name,
            ]);
            if($post){
                $response['status'] = true;
                $response['id'] = $post->id;
                $response['title'] = $post->title;
                echo json_encode($response);
                exit;
            }
            echo json_encode($response);
                exit;
        }
    }

    /**
     * Get Edit Post Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        $post = App\Post::find($id);
        return view('Backend.edit-post')->with([
            'post'=>$post,
        ]);
    }

        /**
     * Update Post
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {

        $this->validate($request, [
                'title'=>'required|string|max:255',
                'content'=>'required|string',
                'image'=>'image',
            ]);

        $post = App\Post::find($id);
        if (!empty($request->file('image'))) {
            unlink('uploads/blog/' . $post->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/blog/', $imageName);
            $post->image = $imageName;
        }
        $post->title = $request->title;
        $post->post = $request->content;
        $post->save();
        Session::flash('success', 'Your Post has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Delete Post.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $response = false;
        $post = App\Post::find($id);
        unlink('uploads/blog/' . $post->image);
        if($post->delete()){
            $response = true;
            echo json_encode($response);
            exit;
        }
        echo json_encode($response);
        exit;
    }
}
