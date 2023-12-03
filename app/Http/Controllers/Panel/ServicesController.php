<?php

namespace App\Http\Controllers\Panel;

use App\Models\Services;

class ServicesController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Hizmetlerimiz';
        $this->page = 'services';
        $this->upload = 'services';
        $this->model = new Services();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Hizmetlerimiz' => route('panel.services_list'),
            ),
        );

        parent::__construct();
    }
}
