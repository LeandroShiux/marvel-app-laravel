<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class ComicsLastWeekCommand extends Command
{
    public $timestamp = 1637415463888;
    public $publicKey = '86091d5eb5be705cd3eaa31be1dce3f8';
    public $hash = '23f98cb5d565a5ce7cb75828739e4bd0';
    public $results;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comics:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'As HQs da última semana foram importadas com sucesso!';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url ='http://gateway.marvel.com/v1/public/comics?dateDescriptor=lastWeek'.'&ts='.$this->timestamp.'&apikey='.$this->publicKey.'&hash='.$this->hash;
        $response = Http::get($url)->json();
        $this->results = $response['data']['results'];

        redirect()->intended('home')->with('results',$this->results);
    }
}
