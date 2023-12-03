<?php

namespace App\Http\Controllers\Panel;

use App\Models\Appointment;

class AppointmentController extends BaseController
{
    use BasePattern;

    public function __construct()
    {
        $this->title = 'Randevular';
        $this->page = 'appointment';
        $this->upload = 'appointment';
        $this->model = new Appointment();

        $this->view = (object)array(
            'breadcrumb' => array(
                'Randevular' => route('panel.appointment_list'),
            ),
        );

        parent::__construct();
    }
}
