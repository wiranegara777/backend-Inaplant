<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//GET LIST USER BY ROLE
 /**
 * @SWG\Get(
 *   tags={"user"},
 *   path="/users/{role}",
 *   summary="get list user by role",
 *   operationId="fetch user",
 *   @SWG\Parameter(
 *     name="role",
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

 // LOGOUT API
/**
 * @SWG\Post(
 *   tags={"user"},
 *   path="/logout",
 *   summary="Logout api",
 *   operationId="logout",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="api for logout",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="devicetoken",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 *   security={{"Bearer":{}}}
 * )
 *
 */