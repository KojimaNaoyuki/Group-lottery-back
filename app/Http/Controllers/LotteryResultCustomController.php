<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LotteryResult;

class LotteryResultCustomController extends Controller
{
    public function getLotteryResultMember(Request $request)
    {
        //抽選当選者取得
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
    public function validationAlready(Request $request)
    {
        //抽選済みチェック
        $item = LotteryResult::where('group_id', $request->group_id)->where('room_id', $request->room_id)->get();

        if (count($item) != 0) {
            return response()->json([
                'data' => false
            ], 200);
        } else if (count($item) == 0) {
            return response()->json([
                'data' => true
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
