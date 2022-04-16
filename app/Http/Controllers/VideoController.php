<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store (Request $request){
        try {
            $video = new Video();
            $video->user_id = $request->user_id;
            $video->video = $request->video;



            if ($video->save()){
                return response([
                    "status" => "success",
                    "message" => "Video Successfully Save"
                ]);
            }


        }catch (\Exception $e){
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update (Request $request){
        dd($request->all());
        try {
            $video = new Video();
            $video->rating = $request->id;





            if ($video->save()){
                return response([
                    "status" => "success",
                    "message" => "Video Successfully Save"
                ]);
            }


        }catch (\Exception $e){
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function index (Request $request){
        try {
            $video = Video::latest()->get();

            return response([
                "status" => "success",
                "data" => $video
            ]);


        }catch (\Exception $e){
            return response([
                'status' => 'serverError',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
