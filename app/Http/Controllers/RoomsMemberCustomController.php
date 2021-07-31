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
    public function whereRoom_id(Request $request)
    {
        //ルームidで検索
        $item = RoomsMember::where('room_id', $request->room_id)->get();

        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
