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