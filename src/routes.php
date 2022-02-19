<?php

use ammahmoodtork\accounting\Controller\DetailedsController;
use ammahmoodtork\accounting\Controller\DocumentController;
use ammahmoodtork\accounting\Controller\TopicsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/detaileds')->group(function(){
    Route::get('/' , [DetailedsController::class , 'index']);
    Route::get('/{id}' , [DetailedsController::class , 'select']);
    Route::post('/' , [DetailedsController::class , 'save']);
    Route::put('/{id}' , [DetailedsController::class , 'update']);
});
Route::prefix('/topics')->group(function(){
    Route::get('/' , [TopicsController::class , 'index']);
    Route::get('/{id}' , [TopicsController::class , 'select']);
    Route::post('/' , [TopicsController::class , 'save']);
    Route::put('/{id}' , [TopicsController::class , 'update']);
});
Route::prefix('/documents')->group(function(){
    Route::get('/' , [DocumentController::class , 'index']);
    Route::get('/{id}' , [DocumentController::class , 'select']);
    Route::post('/' , [DocumentController::class , 'save']);
});


?>