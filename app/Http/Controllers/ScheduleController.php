<?php 


// LOGIN API
/**
 * @SWG\Post(
 *   tags={"schedule"},
 *   path="/schedule",
 *   summary="add new Schedule",
 *   operationId="PostSchedule",
 *   @SWG\Parameter(
 *     name="image",
 *     in="formData",
 *     type="file",
 *     description="the file you upload",
 *   ),
 *   @SWG\Parameter(
 *     name="farm_id",
 *     in="formData",
 *     type="integer",
 *     description="farm id",
 *   ),
 *   @SWG\Parameter(
 *     name="task",
 *     in="formData",
 *     type="string",
 *     description="task",
 *   ),
 *   @SWG\Parameter(
 *     name="description",
 *     in="formData",
 *     type="string",
 *     description="description",
 *   ),
 *   @SWG\Response(response=200, description="successful operation"),
 *   @SWG\Response(response=401, description="unauthorized")
 * )
 *
 */