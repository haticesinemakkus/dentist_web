<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function list()
    {
        $teams = Team::all();
        $items = [];
        foreach ($teams as $team) {
            $items[] = [
                'id' => $team->id,
                'name' => $team->name,
                'title' => $team->title,
                'image' => $team->image,
                'description' => $team->description,
            ];
        }
        return response()->json($items);
    }
}
