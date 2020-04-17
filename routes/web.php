<?php

Route::view('reset-password', 'app')->name('password.reset');
Route::view('{all}', 'app')->where('all', '^(?!rest/).*$');
