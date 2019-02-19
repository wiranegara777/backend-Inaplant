<?php 

 //POST NEW FORM
 /**
 * @SWG\Post(
 *   tags={"Form"},
 *   path="/form",
 *   summary="add new form",
 *   operationId="addForm",
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="you need login first before using this api",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="variabel1",
 *              type="string",
 *          ),
 *          @SWG\Property(
 *              property="variabel2",
 *              type="string"
 *          )
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

//POST NEW FORM
 /**
 * @SWG\Put(
 *   tags={"Form"},
 *   path="/form/{id}",
 *   summary="update form form",
 *   operationId="updateForm",
 *   @SWG\Parameter(
 *     name="id",
 *     in="path",
 *     type="integer",
 *     description="you need login first before using this api",
 *   ),
 *   @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     required=true,
 *     description="you need login first before using this api",
 *     @SWG\Schema(
 *          @SWG\Property(
 *              property="variabel1",
 *              type="string",
 *          ),
 *          @SWG\Property(
 *              property="variabel2",
 *              type="string"
 *          )
 *     )
 *   ),
 *   @SWG\Response(response=200, description="successful"),
 *   security={{"Bearer":{}}}
 * )
 *
 */

//FETCH POST BY ID AHLI PRAKTISI
 /**
 * @SWG\Get(
 *   tags={"Form"},
 *   path="/form",
 *   summary="get Form",
 *   operationId="getForm",
 *   @SWG\Response(response=200, description="successful"),
 *   @SWG\Response(response=401, description="unauthenticated"),
 *   security={{"Bearer":{}}}
 * )
 *
 */