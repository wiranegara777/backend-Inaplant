<?php 

 //POST GroupFarm
 /**
 * @SWG\Post(
 *   tags={"GroupFarm"},
 *   path="/groupfarm",
 *   summary="add new groupFarm",
 *   operationId="addNewGroup",
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
 *              property="id_pemilik_lahan",
 *              type="integer"
 *          ),
 *           @SWG\Property(
 *              property="komoditas",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

  //GET GROUP FARM detail
 /**
 * @SWG\Get(
 *   tags={"GroupFarm"},
 *   path="/groupfarm/{id}",
 *   summary="get groupfarm detail",
 *   operationId="fetchgroupfarm",
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

 //POST GroupFarm
 /**
 * @SWG\Post(
 *   tags={"Term"},
 *   path="/term",
 *   summary="add new Term (Time periodic)",
 *   operationId="addNewTerm",
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
 *              property="id_pemilik_lahan",
 *              type="integer"
 *          ),
 *           @SWG\Property(
 *              property="start_date",
 *              type="string"
 *          ),
 *           @SWG\Property(
 *              property="end_date",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

   //GET list TERM
 /**
 * @SWG\Get(
 *   tags={"Term"},
 *   path="/term/{id_pemilik_lahan}",
 *   summary="get list term",
 *   operationId="getTerms",
 *   @SWG\Parameter(
 *     name="id_pemilik_lahan",
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

// edit Profile farm
/**
 * @SWG\Put(
 *   tags={"farm"},
 *   path="/farm/{id_farm}",
 *   summary="edit profile farm (note : bisa isi salah satu, dua,dst atau semua attribut)",
 *   operationId="editProfilFarm",
 *   @SWG\Parameter(
 *     name="id_farm",
 *     in="path",
 *     type="integer",
 *     description="farm id",
 *   ),
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="Login first before using this api",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="jumlah_pohon",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="varietas",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="siklus_pertumbuhan",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="panen_pertama",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="panen_terakhir",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="jumlah_produksi_pertahun",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="latitude_longtitude_1",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="latitude_longtitude_2",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="latitude_longtitude_3",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="latitude_longtitude_4",
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

   //GET list TERM
 /**
 * @SWG\Get(
 *   tags={"user"},
 *   path="/user_groupfarm",
 *   summary="get groupfarm that associated to farmmanager",
 *   operationId="getgroupfarmuser",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

   //GET Detail farm
 /**
 * @SWG\Get(
 *   tags={"farm"},
 *   path="/farm/{id_farm}",
 *   summary="get detailFarm by id_farm",
 *   operationId="getdetailfarmm",
 *   @SWG\Parameter(
 *     name="id_farm",
 *     in="path",
 *     type="integer",
 *     description="farm id",
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

    //GET list TERM
 /**
 * @SWG\Get(
 *   tags={"varietas"},
 *   path="/varietas",
 *   summary="get all varietas",
 *   operationId="getallvarietas",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

    //GET list farmmanager that associated to group
 /**
 * @SWG\Get(
 *   tags={"GroupFarm"},
 *   path="/list_farmmanager/{id_group_farm}",
 *   summary="get list farm manager in group farm",
 *   operationId="getlistfarmmanagergroup",
 *   @SWG\Parameter(
 *     name="id_group_farm",
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