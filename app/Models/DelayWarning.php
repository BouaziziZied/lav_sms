<?php

namespace App\Models;

use Eloquent;

class DelayWarning extends Eloquent
{
    protected $fillable = ['name', 'section', 'date'];
}
