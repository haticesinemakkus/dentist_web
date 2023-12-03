<?php

namespace App\Http\Controllers\Panel;

use App\Models\AppointmentRequest;

class AppointmentRequestController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Randevu Talepleri';
        $this->page = 'appointment_request';
        $this->upload = 'appointment_request';
        $this->model = new AppointmentRequest();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Randevu Talepleri' => route('panel.appointment_request_list'),
            ),
        );

        parent::__construct();
    }
}
