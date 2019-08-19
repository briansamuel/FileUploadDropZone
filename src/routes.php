<?php

Route::get('fileupload', 'FileUploadDropZone\Controllers\DropZoneController@multifileupload')->name('multifileupload');
Route::post('fileupload', 'FileUploadDropZone\Controllers\DropZoneController@store')->name('multifileupload');