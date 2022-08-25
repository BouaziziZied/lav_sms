<?php

namespace App\Repositories;

use App\Models\DelayWarning;

class DelayWarningRepo
{
    public function all()
    {
        return DelayWarning::orderBy('name', 'asc')->get();
    }

    public function find($id)
    {
        return DelayWarning::find($id);
    }

    public function create($data)
    {
        return DelayWarning::create($data);
    }

    public function update($id, $data)
    {
        return DelayWarning::find($id)->update($data);
    }

    public function delete($id)
    {
        return DelayWarning::destroy($id);
    }
}
