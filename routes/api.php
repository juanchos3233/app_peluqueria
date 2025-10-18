<?php

use Illuminate\Support\Facades\Route;

Route::get('/status', function() {
    return ['ok'=>true,'ts'=>now()->toDateTimeString()];
});
