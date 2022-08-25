<?php

namespace App\Http\Controllers\SupportTeam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelayWarning\DelayWarningCreate;
use App\Http\Requests\DelayWarning\DelayWarningUpdate;
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
        $d['delay_warnings'] = $this->delay_warning->all();

        return view('pages.support_team.delays.warnings.index', $d);
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
        $d['w'] = $w = $this->delay_warning->find($id);

        return is_null($w) ? Qs::goWithDanger('delaywarnings.index') : view('pages.support_team.delays.warnings.edit', $d);
    }

    public function update(DelayWarningUpdate $req, $id)
    {
        $data = $req->only(['name']);
        $this->delay_warning->update($id, $data);

        return Qs::jsonUpdateOk();
    }

    public function destroy($id)
    {
        $this->delay_warning->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

    public function print($pr_id)
    {
        return view('pages.support_team.delays.warnings.print');
    }
}
