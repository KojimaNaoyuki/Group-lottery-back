<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomCustomController extends Controller
{
    public function WhereGroup_id(Request $request)
    {
        //group_idが一致するものだけを取得
        $item = Room::Where('group_id', $request->group_id)->get();

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
