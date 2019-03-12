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
 *          ),
*          @SWG\Property(
 *              property="devicetoken",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized")
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
 *              property="receiver_id",
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
