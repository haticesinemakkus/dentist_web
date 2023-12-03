<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function list()
    {
        $servcies = Services::all();
        $items = [];
        foreach ($servcies as $service) {
            $items[] = [
                'id' => $service->id,
                'title' => $service->title,
                'content' => $service->content,
            ];
        }
        return response()->json($items);
    }

    public function randomServices()
    {
        $services = Services::inRandomOrder()->limit(3)->get();
        $items = [];
        foreach ($services as $service) {
            $items[] = [
                'id' => $service->id,
                'title' => $service->title,
                'content' => $service->content,
            ];
        }
        return response()->json($items);
    }
}
