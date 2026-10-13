<?php

use Illuminate\Database\Eloquent\Model;

arch('no debugging functions are left in the code')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'die', 'exit'])
    ->not->toBeUsed();

arch('env() is only used in config files')
    ->expect('env')
    ->not->toBeUsedIn('App');

arch('models extend the Eloquent model')
    ->expect('App\Models')
    ->toExtend(Model::class);
