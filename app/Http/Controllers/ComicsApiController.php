<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ComicsApiController extends Controller
{
    protected $timestamp = 1637415463888;
    protected $publicKey = '86091d5eb5be705cd3eaa31be1dce3f8';
    protected $hash = '23f98cb5d565a5ce7cb75828739e4bd0';
    public $results;

    public function managerRequest(Request $request){
        if(isset($_GET['comic'])){
            $endpoint = 'comics';
            $filter = '?title='.$request->input('comic').'&limit=10';
            $url ='http://gateway.marvel.com/v1/public/'.$endpoint.$filter.'&ts='.$this->timestamp.'&apikey='.$this->publicKey.'&hash='.$this->hash;
            $response = Http::get($url)->json();
            $this->results = $response['data']['results'];
        }

        return view('comics',['results' => $this->results]);

    }
}
