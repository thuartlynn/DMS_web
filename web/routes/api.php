<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Get Function
Route::get('/Contractinfo', 'ContractsController@GetAllContractInfomation');
Route::get('/MaintenanceStaffs', 'ContractsController@GetMaintenanceMember');
Route::get('/getInfo/{Contract_ID}', 'ContractsController@GetContractInfomation');


//Get Function
Route::post('/AddNewContract', 'ContractsController@AddNewContract');
Route::post('/SelectContract/{Contract_ID}', 'ContractsController@GetContractInfomation');
