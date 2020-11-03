<?php

use FreeAbrams\WangEditor\Http\Controllers\WangEditorController;

Route::get('WangEditor', WangEditorController::class.'@index');
Route::post('editor-image-upload', WangEditorController::class.'@imageUpload')->name('editorImageUpload');
