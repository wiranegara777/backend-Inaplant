<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// LOGIN API
/**
 * @SWG\Post(
 *   tags={"user"},
 *   path="/login",
 *   summary="Login api",
 *   operationId="getUserDetails",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="api for login that return token for authentication and user detail",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="email",
 *              type="string",
 *              description="pemiliklahan@gmail.com"
 *          ),
 *          @SWG\Property(
 *              property="password",
 *              type="string"
 *          )
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized")
 * )
 *
 */

//FETCH MESSAGE API
 /**
 * @SWG\Get(
 *   tags={"user"},
 *   path="/user_info",
 *   summary="fetch user info",
 *   operationId="fetch message",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 //PUSHER MESSAGE API
 /**
 * @SWG\Post(
 *   tags={"Message"},
 *   path="/pusher",
 *   summary="Push Notification Message",
 *   operationId="PushNotifications",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="you need login first before using this api",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *          ),
 *          @SWG\Property(
 *              property="message",
 *              type="string"
 *          )
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

//FETCH MESSAGE API
 /**
 * @SWG\Get(
 *   tags={"Message"},
 *   path="/messages/{message_id}",
 *   summary="fetch all message between farmmanager and ahlipraktisi",
 *   operationId="fetch message",
 *   @SWG\Parameter(
 *     name="message_id",
 *     in="path",
 *     type="integer",
 *     description="you need login first before using this api",
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 //SEND MESSAGE API
 /**
 * @SWG\Post(
 *   tags={"Message"},
 *   path="/messages",
 *   summary="send message",
 *   description="you need login first before using this api",
 *   operationId="send message",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="you need login first before using this api",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="message",
 *              type="string",
 *          ),
 *          @SWG\Property(
 *              property="sender_id",
 *              type="integer",
 *          ),
 *          @SWG\Property(
 *              property="message_id",
 *              type="integer",
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

//FETCH MESSAGE API
 /**
 * @SWG\Get(
 *   tags={"Farm"},
 *   path="/farm",
 *   summary="fetch list farm that supervised by ahli praktisi",
 *   description="you need login first before using this api!",
 *   operationId="fetch farm",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 //Create FARM API
 /**
 * @SWG\Post(
 *   tags={"Farm"},
 *   path="/farm",
 *   summary="create farm",
 *   operationId="send message",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="you need login first before using this api !",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="name",
 *              type="string",
 *          ),
 *          @SWG\Property(
 *              property="id_pemilik_lahan",
 *              type="integer",
 *          ),
 *          @SWG\Property(
 *              property="id_farm_manager",
 *              type="integer",
 *          ),
 *          @SWG\Property(
 *              property="id_ahli_praktisi",
 *              type="integer",
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 //Upload FILE
 /**
 * @SWG\Post(
 *   tags={"File"},
 *   path="/image",
 *   summary="Image Upload",
 *   operationId="ImageUpload",
 *   @SWG\Parameter(
 *     name="image",
 *     in="formData",
 *     type="file",
 *     description="the file you upload",
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 * )
 *
 */


class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json('Ok');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
