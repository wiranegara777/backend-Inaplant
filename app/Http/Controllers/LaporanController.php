<?php

 //Upload FILE
 /**
 * @SWG\Post(
 *   tags={"Laporan"},
 *   path="/laporan",
 *   summary="post laporan",
 *   operationId="laporanPost",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="post task",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="name",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="note",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="varietas",
 *              type="integer"
 *          ),
 *          @SWG\Property(
 *              property="location",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="is_overdue",
 *              type="integer"
 *          ),
 *          @SWG\Property(
 *              property="perulangan",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="foto1",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="foto2",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="foto3",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

   //GET list laporan by pemilik lahan
 /**
 * @SWG\Get(
 *   tags={"Laporan"},
 *   path="/laporans",
 *   summary="get list laporan by pemilik lahan",
 *   operationId="getlistlaporan",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

   //GET Detail farm
 /**
 * @SWG\Get(
 *   tags={"Laporan"},
 *   path="/laporan/{id_laporan}",
 *   summary="get detaillaporan by id laporan",
 *   operationId="getdetaillaporanbyid",
 *   @SWG\Parameter(
 *     name="id_laporan",
 *     in="path",
 *     type="integer",
 *     description="id laporan",
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */