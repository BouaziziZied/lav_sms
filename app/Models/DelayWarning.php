<?php

namespace App\Models;

use Eloquent;

class DelayWarning extends Eloquent
{
    protected $fillable = ['name', 'section', 'day', 'date', 'hour', 'student_signature', 'parent_phone', 'parent_statement'];
}
