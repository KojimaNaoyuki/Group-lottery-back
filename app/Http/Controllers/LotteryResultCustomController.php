<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotteryResult;

class LotteryResultCustomController extends Controller
{
    public function getLotteryResultMember(Request $request)
    {
        $item = LotteryResult::where('group_id', $request->group_id)->where('room_id', $request->room_id)->get();

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
