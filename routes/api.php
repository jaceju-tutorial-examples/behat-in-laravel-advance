<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 註：這邊只是為了示範，所以沒有特別將程式碼優化或考慮任何安全性。
Route::middleware('api')->post('/users', function (Request $request) {
    \App\User::create($request->all());
    return new \Illuminate\Http\JsonResponse([], 201);
});
