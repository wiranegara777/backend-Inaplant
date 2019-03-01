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