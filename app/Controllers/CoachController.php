<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Coach;
use CodeIgniter\HTTP\ResponseInterface;

class CoachController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Coach;
    }

    public function index()
    {
        return view('coach/index');
    }

    public function form(string $id = null)
    {
        $data = null;

        if ($id) {
            $data = $this->model->select('
                    player.id,
                    player.name,
                    player.position,
                    player.image,
                    player.birthday,
                    player.team_id,
                    team.name as team
                ')->join('team', 'team.id=player.team_id')->first();
        }

        return view('coach/form', ['data' => $data]);
    }
}
