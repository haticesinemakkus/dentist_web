<?php

namespace App\Http\Controllers\Panel;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Ekibimiz';
        $this->page = 'team';
        $this->upload = 'team';
        $this->model = new Team();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Ekibimiz' => route('panel.team_list'),
            ),
        );

        parent::__construct();
    }
}
