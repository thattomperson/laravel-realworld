<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('refresh', function () {
    try {
        $this->info('Deleting database');
        unlink(database_path('database.sqlite'));
    } catch (Exception $e) {
    }

    $this->info('Creating new database');
    touch(database_path('database.sqlite'));

    Artisan::call('migrate', ['--force' => true], $this->getOutput());
    Artisan::call('db:seed', ['--force' => true], $this->getOutput());
})->describe('Refresh the whole database');
