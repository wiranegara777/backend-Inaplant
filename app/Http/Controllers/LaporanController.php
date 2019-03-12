<?php

 //Upload FILE
 /**
 * @SWG\Post(
 *   tags={"Laporan"},
 *   path="/laporan",
 *   summary="post laporan",
 *   operationId="laporanPost",
 *   @SWG\Parameter(
 *     name="name",
 *     in="formData",
 *     type="string",
 *     description="name Laporan",
 *   ),
 *   @SWG\Parameter(
 *     name="note",
 *     in="formData",
 *     type="string",
 *     description="Note from farmmanager",
 *   ),
 *   @SWG\Parameter(
 *     name="varietas",
 *     in="formData",
 *     type="string",
 *     description="varietas tanaman",
 *   ),
 *   @SWG\Parameter(
 *     name="is_overdue",
 *     in="formData",
 *     type="integer",
 *     description="is overdue",
 *   ),
 *   @SWG\Parameter(
 *     name="foto1",
 *     in="formData",
 *     type="file",
 *     description="optional foto1",
 *   ),
 *   @SWG\Parameter(
 *     name="foto2",
 *     in="formData",
 *     type="file",
 *     description="optional foto2",
 *   ),
 *   @SWG\Parameter(
 *     name="foto3",
 *     in="formData",
 *     type="file",
 *     description="optional foto3",
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