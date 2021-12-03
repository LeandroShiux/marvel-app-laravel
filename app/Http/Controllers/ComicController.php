<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Post;



class ComicController extends Controller
{
    public $result;

    public function displayComic(){
        $id = $_GET['id'];
        $resources = '?ts=1637415463888&apikey=86091d5eb5be705cd3eaa31be1dce3f8&hash=23f98cb5d565a5ce7cb75828739e4bd0';
        $url = 'http://gateway.marvel.com/v1/public/comics/'.$id.$resources;
        $response = Http::get($url)->json();
        $this->result = $response['data']['results'][0];

        $posts = Post::get();

        return view('comic',[
            'result' => $this->result,
            'posts' => $posts
        ]);
    }

    
    public function storepost(Request $request,$id = null)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroypost(Post $post,$id = null)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
