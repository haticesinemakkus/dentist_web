<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentRequest;
use Illuminate\Http\Request;

class AppointmntController extends Controller
{
    public function save(Request $request)
    {
        try {
            $data = $request->all();
            $data['created_at'] = now();
            $data['updated_at'] = now();

            $appointment = Appointment::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Randevu talebiniz başarıyla alındı.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Randevu talebi oluşturulurken bir hata oluştu.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function appointmentRequest(Request $request)
    {
        try {
            $data = $request->all();
            $data['created_at'] = now();
            $data['updated_at'] = now();

            $appointment = AppointmentRequest::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Randevu talebiniz başarıyla alındı.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Randevu talebi oluşturulurken bir hata oluştu.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
