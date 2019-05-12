<?php

// LOGOUT API
/**
 * @SWG\Post(
 *   tags={"Task2"},
 *   path="/task2",
 *   summary="post task2",
 *   operationId="posttask2",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="post task2",
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
 *              property="start_date",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="end_date",
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


 //GET LIST TASKS per id_pemilik_lahan
 /**
 * @SWG\Get(
 *   tags={"Task2"},
 *   path="/task2s/{id_pemilik_lahan}",
 *   summary="get list task 2",
 *   operationId="fetchlisttask2",
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


 //edit task by pemilik lahan 
 /**
 * @SWG\Put(
 *   tags={"Task2"},
 *   path="/task2_pemiliklahan/{id_task}",
 *   summary="edit task2",
 *   operationId="edittaskpemiliklahan2",
 *   @SWG\Parameter(
 *     name="id_task",
 *     in="path",
 *     type="integer",
 *     description="you need login first before using this api",
 *   ),
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="edit task pemilik lahan",
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
 *              property="start_date",
 *              type="string"
 *          ),
 *          @SWG\Property(
 *              property="end_date",
 *              type="string"
 *          ),
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

//update status task
 /**
 * @SWG\Put(
 *   tags={"Task2"},
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