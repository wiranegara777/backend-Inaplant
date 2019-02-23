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

 //GET LIST USER BY ROLE
 /**
 * @SWG\Get(
 *   tags={"user"},
 *   path="/user/{id}",
 *   summary="get user detail by id",
 *   operationId="fetch user by id",
 *   @SWG\Parameter(
 *     name="id",
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

  // REGISTER AHLI_PRAKTISI
/**
 * @SWG\Post(
 *   tags={"Ahli_Praktisi"},
 *   path="/register_ahli",
 *   summary="Register Ahli Praktisi",
 *   operationId="regisAhli",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="Register Ahli Praktisi",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="name",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="email",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="password",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="c_password",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="komoditas",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 * )
 *
 */

  // edit Profile
/**
 * @SWG\Put(
 *   tags={"user"},
 *   path="/user/{id}",
 *   summary="edit profile user",
 *   operationId="editProfilUser",
 *   @SWG\Parameter(
 *     name="id",
 *     in="path",
 *     type="integer",
 *     description="user id",
 *   ),
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="Login first before using this api",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="name",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="email",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="no_hp",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="alamat",
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

 //Upload FILE
 /**
 * @SWG\Post(
 *   tags={"user"},
 *   path="/user_foto/{id}",
 *   summary="edit foto user",
 *   operationId="ImageUploadUser",
 *   @SWG\Parameter(
 *     name="id",
 *     in="path",
 *     type="integer",
 *     description="user id",
 *   ),
 *   @SWG\Parameter(
 *     name="image",
 *     in="formData",
 *     type="file",
 *     description="the file you upload",
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */