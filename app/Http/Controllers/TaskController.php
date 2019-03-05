<?php

// LOGOUT API
/**
 * @SWG\Post(
 *   tags={"Task"},
 *   path="/task",
 *   summary="post task",
 *   operationId="posttask",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="post task",
 *     @SWG\Schema( 
 *          @SWG\Property(
 *              property="title",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="description",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="id_pemilik_lahan",
 *              type="integer"
 *          ),
 *          @SWG\Property(
 *              property="id_term",
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


 //GET LIST TASKS per id_pemilik_lahan
 /**
 * @SWG\Get(
 *   tags={"Task"},
 *   path="/tasks/{id_pemilik_lahan}",
 *   summary="get list user by role",
 *   operationId="fetchlisttask",
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

 //GET Detail task with status
 /**
 * @SWG\Get(
 *   tags={"Task"},
 *   path="/task/{id_task}",
 *   summary="get detail task",
 *   operationId="fetchdetailtask",
 *   @SWG\Parameter(
 *     name="id_task",
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

 //GET Detail task with status
 /**
 * @SWG\Put(
 *   tags={"Task"},
 *   path="/task/{id_task}",
 *   summary="update status task to 1",
 *   operationId="updatedetailtask",
 *   @SWG\Parameter(
 *     name="id_task",
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