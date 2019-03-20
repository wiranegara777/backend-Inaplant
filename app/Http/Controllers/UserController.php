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
 *   tags={"AhliPraktisi"},
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
 * @SWG\Post(
 *   tags={"user"},
 *   path="/user/{id}",
 *   summary="edit profile user (note : bisa isi salah satu, dua,dst atau semua attribut)",
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
 *     description="edit user profile",
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


 // ASSIGN FARM MANAGER API
/**
 * @SWG\Post(
 *   tags={"FarmManager"},
 *   path="/assign",
 *   summary="assign farm manager to GroupFarm",
 *   operationId="assign",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="login first before using this api",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="id_farm_manager",
 *              type="integer"
 *          ),
 *          @SWG\Property(
 *              property="id_group_farm",
 *              type="integer"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

  // REGISTER FARM MANAGER
/**
 * @SWG\Post(
 *   tags={"FarmManager"},
 *   path="/register_farmmanager",
 *   summary="Register Farm Manager",
 *   operationId="regisfarmmanager",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="Register Farm Manager",
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
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 * )
 *
 */

  // REGISTER PEMILIK LAHAN
/**
 * @SWG\Post(
 *   tags={"PemilikLahan"},
 *   path="/register_pemiliklahan",
 *   summary="Register Pemilik lahan dan Group Farm",
 *   operationId="regispemilliklahan",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="Register Farm Manager",
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
 *              property="group_farm_name",
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

 //GET LIST USER BY ROLE
 /**
 * @SWG\Get(
 *   tags={"AhliPraktisi"},
 *   path="/list_ahli",
 *   summary="get list ahli praktisi",
 *   operationId="fetch user by id",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 // EDIT FOTO PROFIL USER
/**
 * @SWG\Post(
 *   tags={"user"},
 *   path="/user_foto/{id}",
 *   summary="edit foto profile user",
 *   operationId="userfotoprofile",
 *   @SWG\Parameter(
 *     name="id",
 *     in="path",
 *     type="integer",
 *     description="id user",
 *   ),
 *   @SWG\Parameter(
 *     name="image",
 *     in="formData",
 *     type="file",
 *     description="foto profile",
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

 // EDIT FOTO PROFIL USER
/**
 * @SWG\Post(
 *   tags={"image"},
 *   path="/image_upload",
 *   summary="upload image",
 *   operationId="uploadImage",
 *   @SWG\Parameter(
 *     name="image",
 *     in="formData",
 *     type="file",
 *     description="image file to upload",
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

