<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->group(
    ['version' => 'v1', 'prefix' => 'v1', 'middleware' => ['check.role.access']],
    function ($api) {

        
        //apartments-facilities CRUD
        $api->group(
            ['prefix' => '/apartments-facilities'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/apartments-facilities",
                 *     tags={"apartments-facilities"},
                 *     description="Get list of apartments-facilities",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\ApartmentFacilityController@index')
                    ->name('apartments-facilities');

                /**
                 * @SWG\Get(
                 *     path="/apartments-facilities/show/{id}",
                 *     tags={"apartments-facilities"},
                 *     description="Get specific apartment-facility by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="apartment-facility with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentFacilityController@show')
                    ->name('apartments-facilities.show.id');

                /**
                 * @SWG\Post(
                 *     path="/apartments-facilities/create",
                 *     tags={"apartments-facilities"},
                 *     description="Create apartment-facility",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment-facility",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\ApartmentFacilityController@store')
                    ->name('apartments-facilities.create');

                /**
                 * @SWG\Patch(
                 *     path="/apartments-facilities/update/{id}",
                 *     tags={"apartments-facilities"},
                 *     description="Update specific apartment-facility by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment-facility"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentFacilityController@update')
                    ->name('apartments-facilities.update');

                /**
                 * @SWG\Delete(
                 *     path="/apartments-facilities/delete/{id}",
                 *     tags={"apartments-facilities"},
                 *     description="Delete specific apartment-facility by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentFacilityController@destroy')
                    ->name('apartments-facilities.delete');
            }
        );

        //apartments-types CRUD
        $api->group(
            ['prefix' => '/apartments-types'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/apartments-types",
                 *     tags={"apartments-types"},
                 *     description="Get list of apartments-types",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\ApartmentTypeController@index')
                    ->name('apartments-types');

                /**
                 * @SWG\Get(
                 *     path="/apartments-types/show/{id}",
                 *     tags={"apartments-types"},
                 *     description="Get specific apartment-type by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="apartment-type with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentTypeController@show')
                    ->name('apartments-types.show.id');

                /**
                 * @SWG\Post(
                 *     path="/apartments-types/create",
                 *     tags={"apartments-types"},
                 *     description="Create apartment-type",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment-type",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\ApartmentTypeController@store')
                    ->name('apartments-types.create');

                /**
                 * @SWG\Patch(
                 *     path="/apartments-types/update/{id}",
                 *     tags={"apartments-types"},
                 *     description="Update specific apartment-type by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment-type"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentTypeController@update')
                    ->name('apartments-types.update');

                /**
                 * @SWG\Delete(
                 *     path="/apartments-types/delete/{id}",
                 *     tags={"apartments-types"},
                 *     description="Delete specific apartment-type by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentTypeController@destroy')
                    ->name('apartments-types.delete');
            }
        );

        //apartments CRUD
        $api->group(
            ['prefix' => '/apartments'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/apartments",
                 *     tags={"apartments"},
                 *     description="Get list of apartments",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\ApartmentController@index')
                    ->name('apartments');

                /**
                 * @SWG\Get(
                 *     path="/apartments/show/{id}",
                 *     tags={"apartments"},
                 *     description="Get specific apartment by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="apartment with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentController@show')
                    ->name('apartments.show.id');

                /**
                 * @SWG\Post(
                 *     path="/apartments/create",
                 *     tags={"apartments"},
                 *     description="Create apartment",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\ApartmentController@store')
                    ->name('apartments.create');

                /**
                 * @SWG\Patch(
                 *     path="/apartments/update/{id}",
                 *     tags={"apartments"},
                 *     description="Update specific apartment by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/apartment"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentController@update')
                    ->name('apartments.update');

                /**
                 * @SWG\Delete(
                 *     path="/apartments/delete/{id}",
                 *     tags={"apartments"},
                 *     description="Delete specific apartment by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\ApartmentController@destroy')
                    ->name('apartments.delete');
            }
        );

        //auths-actions-groups CRUD
        $api->group(
            ['prefix' => '/auths-actions-groups'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/auths-actions-groups",
                 *     tags={"auths-actions-groups"},
                 *     description="Get list of auths-actions-groups",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\AuthActionGroupController@index')
                    ->name('auths-actions-groups');

                /**
                 * @SWG\Get(
                 *     path="/auths-actions-groups/show/{id}",
                 *     tags={"auths-actions-groups"},
                 *     description="Get specific auth-action-group by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="auth-action-group with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionGroupController@show')
                    ->name('auths-actions-groups.show.id');

                /**
                 * @SWG\Post(
                 *     path="/auths-actions-groups/create",
                 *     tags={"auths-actions-groups"},
                 *     description="Create auth-action-group",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-action-group",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\AuthActionGroupController@store')
                    ->name('auths-actions-groups.create');

                /**
                 * @SWG\Patch(
                 *     path="/auths-actions-groups/update/{id}",
                 *     tags={"auths-actions-groups"},
                 *     description="Update specific auth-action-group by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-action-group"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionGroupController@update')
                    ->name('auths-actions-groups.update');

                /**
                 * @SWG\Delete(
                 *     path="/auths-actions-groups/delete/{id}",
                 *     tags={"auths-actions-groups"},
                 *     description="Delete specific auth-action-group by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionGroupController@destroy')
                    ->name('auths-actions-groups.delete');
            }
        );

        //auths-actions CRUD
        $api->group(
            ['prefix' => '/auths-actions'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/auths-actions",
                 *     tags={"auths-actions"},
                 *     description="Get list of auths-actions",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\AuthActionController@index')
                    ->name('auths-actions');

                /**
                 * @SWG\Get(
                 *     path="/auths-actions/show/{id}",
                 *     tags={"auths-actions"},
                 *     description="Get specific auth-action by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="auth-action with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionController@show')
                    ->name('auths-actions.show.id');

                /**
                 * @SWG\Post(
                 *     path="/auths-actions/create",
                 *     tags={"auths-actions"},
                 *     description="Create auth-action",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-action",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\AuthActionController@store')
                    ->name('auths-actions.create');

                /**
                 * @SWG\Patch(
                 *     path="/auths-actions/update/{id}",
                 *     tags={"auths-actions"},
                 *     description="Update specific auth-action by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-action"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionController@update')
                    ->name('auths-actions.update');

                /**
                 * @SWG\Delete(
                 *     path="/auths-actions/delete/{id}",
                 *     tags={"auths-actions"},
                 *     description="Delete specific auth-action by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\AuthActionController@destroy')
                    ->name('auths-actions.delete');
            }
        );

        //auths-groups-users CRUD
        $api->group(
            ['prefix' => '/auths-groups-users'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/auths-groups-users",
                 *     tags={"auths-groups-users"},
                 *     description="Get list of auths-groups-users",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\AuthGroupUserController@index')
                    ->name('auths-groups-users');

                /**
                 * @SWG\Get(
                 *     path="/auths-groups-users/show/{id}",
                 *     tags={"auths-groups-users"},
                 *     description="Get specific auth-group-user by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="auth-group-user with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupUserController@show')
                    ->name('auths-groups-users.show.id');

                /**
                 * @SWG\Post(
                 *     path="/auths-groups-users/create",
                 *     tags={"auths-groups-users"},
                 *     description="Create auth-group-user",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-group-user",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\AuthGroupUserController@store')
                    ->name('auths-groups-users.create');

                /**
                 * @SWG\Patch(
                 *     path="/auths-groups-users/update/{id}",
                 *     tags={"auths-groups-users"},
                 *     description="Update specific auth-group-user by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-group-user"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupUserController@update')
                    ->name('auths-groups-users.update');

                /**
                 * @SWG\Delete(
                 *     path="/auths-groups-users/delete/{id}",
                 *     tags={"auths-groups-users"},
                 *     description="Delete specific auth-group-user by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupUserController@destroy')
                    ->name('auths-groups-users.delete');
            }
        );

        //auths-groups CRUD
        $api->group(
            ['prefix' => '/auths-groups'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/auths-groups",
                 *     tags={"auths-groups"},
                 *     description="Get list of auths-groups",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\AuthGroupController@index')
                    ->name('auths-groups');

                /**
                 * @SWG\Get(
                 *     path="/auths-groups/show/{id}",
                 *     tags={"auths-groups"},
                 *     description="Get specific auth-group by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="auth-group with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupController@show')
                    ->name('auths-groups.show.id');

                /**
                 * @SWG\Post(
                 *     path="/auths-groups/create",
                 *     tags={"auths-groups"},
                 *     description="Create auth-group",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-group",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\AuthGroupController@store')
                    ->name('auths-groups.create');

                /**
                 * @SWG\Patch(
                 *     path="/auths-groups/update/{id}",
                 *     tags={"auths-groups"},
                 *     description="Update specific auth-group by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/auth-group"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupController@update')
                    ->name('auths-groups.update');

                /**
                 * @SWG\Delete(
                 *     path="/auths-groups/delete/{id}",
                 *     tags={"auths-groups"},
                 *     description="Delete specific auth-group by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\AuthGroupController@destroy')
                    ->name('auths-groups.delete');
            }
        );

        //bookings-statuses CRUD
        $api->group(
            ['prefix' => '/bookings-statuses'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/bookings-statuses",
                 *     tags={"bookings-statuses"},
                 *     description="Get list of bookings-statuses",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\BookingStatusController@index')
                    ->name('bookings-statuses');

                /**
                 * @SWG\Get(
                 *     path="/bookings-statuses/show/{id}",
                 *     tags={"bookings-statuses"},
                 *     description="Get specific booking-status by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="booking-status with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\BookingStatusController@show')
                    ->name('bookings-statuses.show.id');

                /**
                 * @SWG\Post(
                 *     path="/bookings-statuses/create",
                 *     tags={"bookings-statuses"},
                 *     description="Create booking-status",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/booking-status",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\BookingStatusController@store')
                    ->name('bookings-statuses.create');

                /**
                 * @SWG\Patch(
                 *     path="/bookings-statuses/update/{id}",
                 *     tags={"bookings-statuses"},
                 *     description="Update specific booking-status by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/booking-status"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\BookingStatusController@update')
                    ->name('bookings-statuses.update');

                /**
                 * @SWG\Delete(
                 *     path="/bookings-statuses/delete/{id}",
                 *     tags={"bookings-statuses"},
                 *     description="Delete specific booking-status by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\BookingStatusController@destroy')
                    ->name('bookings-statuses.delete');
            }
        );

        //bookings CRUD
        $api->group(
            ['prefix' => '/bookings'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/bookings",
                 *     tags={"bookings"},
                 *     description="Get list of bookings",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\BookingController@index')
                    ->name('bookings');

                /**
                 * @SWG\Get(
                 *     path="/bookings/show/{id}",
                 *     tags={"bookings"},
                 *     description="Get specific booking by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="booking with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\BookingController@show')
                    ->name('bookings.show.id');

                /**
                 * @SWG\Post(
                 *     path="/bookings/create",
                 *     tags={"bookings"},
                 *     description="Create booking",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/booking",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\BookingController@store')
                    ->name('bookings.create');

                /**
                 * @SWG\Patch(
                 *     path="/bookings/update/{id}",
                 *     tags={"bookings"},
                 *     description="Update specific booking by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/booking"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\BookingController@update')
                    ->name('bookings.update');

                /**
                 * @SWG\Delete(
                 *     path="/bookings/delete/{id}",
                 *     tags={"bookings"},
                 *     description="Delete specific booking by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\BookingController@destroy')
                    ->name('bookings.delete');
            }
        );

        //buildings CRUD
        $api->group(
            ['prefix' => '/buildings'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/buildings",
                 *     tags={"buildings"},
                 *     description="Get list of buildings",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\BuildingController@index')
                    ->name('buildings');

                /**
                 * @SWG\Get(
                 *     path="/buildings/show/{id}",
                 *     tags={"buildings"},
                 *     description="Get specific building by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="building with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\BuildingController@show')
                    ->name('buildings.show.id');

                /**
                 * @SWG\Post(
                 *     path="/buildings/create",
                 *     tags={"buildings"},
                 *     description="Create building",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/building",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\BuildingController@store')
                    ->name('buildings.create');

                /**
                 * @SWG\Patch(
                 *     path="/buildings/update/{id}",
                 *     tags={"buildings"},
                 *     description="Update specific building by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/building"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\BuildingController@update')
                    ->name('buildings.update');

                /**
                 * @SWG\Delete(
                 *     path="/buildings/delete/{id}",
                 *     tags={"buildings"},
                 *     description="Delete specific building by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\BuildingController@destroy')
                    ->name('buildings.delete');
            }
        );

        //facilities CRUD
        $api->group(
            ['prefix' => '/facilities'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/facilities",
                 *     tags={"facilities"},
                 *     description="Get list of facilities",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\FacilityController@index')
                    ->name('facilities');

                /**
                 * @SWG\Get(
                 *     path="/facilities/show/{id}",
                 *     tags={"facilities"},
                 *     description="Get specific facility by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="facility with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\FacilityController@show')
                    ->name('facilities.show.id');

                /**
                 * @SWG\Post(
                 *     path="/facilities/create",
                 *     tags={"facilities"},
                 *     description="Create facility",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/facility",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\FacilityController@store')
                    ->name('facilities.create');

                /**
                 * @SWG\Patch(
                 *     path="/facilities/update/{id}",
                 *     tags={"facilities"},
                 *     description="Update specific facility by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/facility"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\FacilityController@update')
                    ->name('facilities.update');

                /**
                 * @SWG\Delete(
                 *     path="/facilities/delete/{id}",
                 *     tags={"facilities"},
                 *     description="Delete specific facility by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\FacilityController@destroy')
                    ->name('facilities.delete');
            }
        );

        //users CRUD
        $api->group(
            ['prefix' => '/users'],
            function ($api) {

                /**
                 * @SWG\Get(
                 *     path="/users",
                 *     tags={"users"},
                 *     description="Get list of users",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *      @SWG\Parameter(
                 *         name="include[]",
                 *         in="query",
                 *         description="List of model relations with limit and offset parameter. Example: {relationName}:limit({limit}|{offset})",
                 *         default="",
                 *         required=false,
                 *         type="array",
                 *         @SWG\Items(
                 *             type="string"
                 *         ),
                 *         collectionFormat="multi"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="page",
                 *         in="query",
                 *         description="Page number",
                 *         required=false,
                 *         default=1,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="limit",
                 *         in="query",
                 *         description="Items limit per page",
                 *         required=false,
                 *         default=10,
                 *         type="integer"
                 *     ),
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Requested resource collection"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/', 'App\REST\Http\Controllers\Api\v1\UserController@index')
                    ->name('users');

                /**
                 * @SWG\Get(
                 *     path="/users/show/{id}",
                 *     tags={"users"},
                 *     description="Get specific user by Id",
                 *     produces= {"application/json"},
                 *
                 *      @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="user with specified id"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->get('/show/{id}', 'App\REST\Http\Controllers\Api\v1\UserController@show')
                    ->name('users.show.id');

                /**
                 * @SWG\Post(
                 *     path="/users/create",
                 *     tags={"users"},
                 *     description="Create user",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/user",
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Created entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->post('/create/', 'App\REST\Http\Controllers\Api\v1\UserController@store')
                    ->name('users.create');

                /**
                 * @SWG\Patch(
                 *     path="/users/update/{id}",
                 *     tags={"users"},
                 *     description="Update specific user by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="",
                 *         in="body",
                 *         description="",
                 *         required=true,
                 *         @SWG\Schema(
                 *             ref="#/definitions/user"
                 *         )
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="200",
                 *         description="Updated entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->patch('/update/{id}', 'App\REST\Http\Controllers\Api\v1\UserController@update')
                    ->name('users.update');

                /**
                 * @SWG\Delete(
                 *     path="/users/delete/{id}",
                 *     tags={"users"},
                 *     description="Delete specific user by Id",
                 *     produces= {"application/json"},
                 *
                 *     @SWG\Parameter(
                 *         name="Authorization",
                 *         in="header",
                 *         description="JWTAuthToken example - Bearer {token}",
                 *         required=true,
                 *         type="string"
                 *     ),
                 *     @SWG\Parameter(
                 *         name="id",
                 *         in="path",
                 *         description="",
                 *         required=true,
                 *         type="integer"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="204",
                 *         description="Deleted entity"
                 *     ),
                 *
                 *     @SWG\Response(
                 *         response="403",
                 *         description="Access forbidden"
                 *     ),
                 *     @SWG\Response(
                 *         response="422",
                 *         description="Unprocessable entity"
                 *     ),
                 *     @SWG\Response(
                 *         response="default",
                 *         description="Unexpected error",
                 *         @SWG\Schema(
                 *             ref="#/definitions/error"
                 *         )
                 *     )
                 * )
                 */
                $api->delete('/delete/{id}', 'App\REST\Http\Controllers\Api\v1\UserController@destroy')
                    ->name('users.delete');
            }
        );


    }
);