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


    }
);