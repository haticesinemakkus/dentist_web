<?php

namespace App\Http\Controllers\Panel;

use App\Models\SSS;

class SSSController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Sıkça Sorulan Sorular';
        $this->page = 'sss';
        $this->upload = 'sss';
        $this->model = new SSS();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Sıkça Sorulan Sorular' => route('panel.sss_list'),
            ),
        );

        parent::__construct();
    }
}
