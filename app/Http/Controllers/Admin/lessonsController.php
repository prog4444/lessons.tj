<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class lessonsController extends Controller
{
        /**
     * @OA\Post(
     ** path="/api/admin/create",
     *   tags={"CRUD_ADMIN"},
     *   security={{"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="name_auto",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="model",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="s_baro",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Response(response=200,description="Success",
     *      @OA\MediaType(mediaType="application/json",)
     *   ),
     *
     *   @OA\Response(response=400,description="Bad Request"),
     *   @OA\Response(response=404,description="not found"),
     *)
     **/
    public function create(Request $request)
    {
        $user_all = $request->validate([
            'name_auto' => 'required|string|max:255',
            'model' => 'required|string',
            's_baro' =>'required|string',

        ]);
       $user =  Lessons::create([
        'name_auto'=> $user_all['name_auto'],
        'model'=> $user_all['model'],
        's_baro'=> $user_all['s_baro'],
       ]);
       $to = $user;
       $code = 200;
       return response()->json([
        'status' => 'Succes',
        'message' => 'successfull registered', $to,
       ], $code);
        
    }

       /**
     * @OA\Get(
     ** path="/api/admin/read",
     *   tags={"CRUD_ADMIN"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200,description="Success",
     *      @OA\MediaType(mediaType="application/json",)
     *   ),
     *
     *   @OA\Response(response=400,description="Bad Request"),
     *   @OA\Response(response=404,description="not found"),
     *)
     **/

    public function read()
    {
        $user = Lessons::all();
        return $user;
    }

       /**
     * @OA\Patch(
     ** path="/api/admin/update/{id}",
     *   tags={"CRUD_ADMIN"},
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(
     *      name="name_auto",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="model",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="s_baro",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Response(response=200,description="Success",
     *      @OA\MediaType(mediaType="application/json",)
     *   ),
     *
     *   @OA\Response(response=400,description="Bad Request"),
     *   @OA\Response(response=404,description="not found"),
     *)
     **/

    public function update(Request $request, $id)
    {
                $validator = Validator::make($request->all(),[
                    'name_auto' => 'required|string|max:255',
                    'model' => 'required|string',
                    's_baro' =>'required|string|',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'errors' => $validator->errors()
                    ], 422);
                }
        try {
            $inter = Lessons::find($id);
            if($inter){         
                
                $inter->update([
                    'name_auto' => $request->name_auto,
                    'model' => $request->model,
                    's_baro' => $request->s_baro,
                ]);
                return response()->json([
                    'message' => 'Изменён!',
                ]);
            }else {
                return response()->json([
                    'message' => 'Not found'
                ], 404);
            }
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Что то работает неправильно пожалуйста обратитесь к СА!(((',
                'errors' => $th->getMessage()
            ], 422);
        }
        
    }

       /**
     * @OA\Post(
     ** path="/api/admin/delete/{id}",
     *   tags={"CRUD_ADMIN"},
     *   security={{"bearerAuth":{}}},
     *
     *   @OA\Parameter(
     *      name="name_auto",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string",
     *      )
     *   ),
     *   @OA\Response(response=200,description="Success",
     *      @OA\MediaType(mediaType="application/json",)
     *   ),
     *
     *   @OA\Response(response=400,description="Bad Request"),
     *   @OA\Response(response=404,description="not found"),
     *)
     **/

    public function dalete($id)
    {
        $task = Lessons::findOrFail($id);
        $result = $task->delete();
        if($result){
            return ['result'=>'Record has been deleted'];
        }
    }
}
