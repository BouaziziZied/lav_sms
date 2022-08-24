<?php

namespace App\Repositories;

use App\Models\DelayWarning;

class DelayWarningRepo
{
    public function create($data)
    {
        return DelayWarning::create($data);
    }
}
