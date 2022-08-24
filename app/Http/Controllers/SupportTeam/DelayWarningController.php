<?php

namespace App\Http\Controllers\SupportTeam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelayWarning\DelayWarningCreate;
use App\Helpers\Qs;
use App\Repositories\DelayWarningRepo;

class DelayWarningController extends Controller
{
    protected $delay_warning;

    public function __construct(DelayWarningRepo $delay_warning)
    {
        $this->middleware('teamSA', ['except' => ['destroy',]]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->delay_warning = $delay_warning;
    }

    public function index()
    {
        return view('pages.support_team.delays.warnings.index');
    }

    public function create()
    {
        //
    }

    public function store(DelayWarningCreate $req)
    {
        $data = $req->all();
        $this->delay_warning->create($data);

        return Qs::jsonStoreOk();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
