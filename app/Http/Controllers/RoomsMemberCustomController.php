<?php

namespace App\Http\Controllers;

use App\Models\RoomsMember;
use Illuminate\Http\Request;

class RoomsMemberCustomController extends Controller
{
    public function getMaxId()
    {
        //登録されている最大のIDを返す
        $item = RoomsMember::max('id');

        if ($item == null) {
            return response()->json([
                'data' => 0
            ], 200);
        } else {
            return response()->json([
                'data' => $item
            ], 200);
        }
    }
}
