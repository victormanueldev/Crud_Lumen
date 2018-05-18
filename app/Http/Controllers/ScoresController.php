<?php

namespace App\Http\Controllers;

use App\Score;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoresController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function index()
    {
        $scores = 
        //DB::table('scores')->select('name', 'score')->get();
        Score::select('id','name', 'score')->get();
        return $scores;
    }

    public function store(Request $request)
    {
        $scores = new Score();
        $scores->name = $request->name;
        $scores->score = $request->score;
        $scores->save();
    }

    public function update(Request $request)
    {
        try{
            $scores = Score::find($request->id);
            if($scores){
                
                $scores->name = $request->name;
                $scores->score = $request->score;
                $scores->update();

                return response()->json(['Table Updated'], 200);
            }
            return response()->json(['Record is not found'], 400);
        }catch(\Exception $e){
            return response(($e), 500);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $score = Score::find($request->id);
            if($score){
                $score->delete();
                return response()->json(['Row deleted'], 200);
            }
            return response()->json(['Record is not found']);
        }catch(\Exception $e){
            return response(($e), 500);
        }
    }
}
