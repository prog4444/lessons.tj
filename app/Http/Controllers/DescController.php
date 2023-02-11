<?php

namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DescController extends Controller
{
      /**
     * @OA\Post(
     *   path="/api/user/comment",
     *   tags={"User"},
     *   summary="Tree step",
     *
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="comment",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *   @OA\Response(
     *       response=403,
     *       description="Forbidden"
     *   )
     * )
     **/
    public function comment(Request $request)
    {
        $val = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'comment' => 'required|string'
        ]);
        if ($val->fails())
        {
            return response(['errors'=>$val->errors()->all()], 422);
        }
        $desc = Description::create([
            'user_id' => $request->user_id,
            'comment' => $request->comment,

        ]);
        return response()->json(
            [
                "data" => [
                    "type" => "activities",
                    "message" => "Success",
                    "data" => $desc,
                ],
            ],
            200
        );
    }
}
