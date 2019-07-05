<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Search_History;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }

    public function history(Request $request){
       $histories = $request->user()->history()->latest()->get();

       $data['histories'] = [];
       foreach ($histories as $history) {
           array_push($data['histories'], ['query'=>$history->query,'type'=>$history->type,'time'=> $history->created_at]);
       }
       // return $data;

        return view('history',$data);
        // var_dump($histories);       
       
    }

    public function search(Request $request){
        $history = new Search_History;
        $history->query = $request->input('query');
        $history->type = $request->input('type');
        $history->user_id = $request->user()->id;
        $history->save();

        // return $history;
        $api_key = 'K3X2RJ8Y';
        $base_url = sprintf('http://isbndb.com/api/v2/json/%s/%s?q=%s',$api_key,$request->input('type'),$request->input('query'));
        $result = json_decode(file_get_contents($base_url));
        return response()->json($result);
    }
}

