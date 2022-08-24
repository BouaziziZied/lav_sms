<?php

namespace App\Repositories;

use App\Models\DelayWarning;

class DelayWarningRepo
{
    public function all()
    {
        return DelayWarning::orderBy('name', 'asc')->get();
    }

    public function create($data)
    {
        return DelayWarning::create($data);
    }
}
