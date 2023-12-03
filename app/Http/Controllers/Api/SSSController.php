<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SSS;
use Illuminate\Http\Request;

class SSSController extends Controller
{
    public function list()
    {
        $sss = SSS::all();
        $items = [];
        foreach ($sss as $item) {
            $items[] = [
                'id' => $item->id,
                'question' => $item->question,
                'answer' => $item->answer,
            ];
        }
        return response()->json($items);
    }
}
