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
    public function Getmemmber(Request $request)
    {
        //ルームidで検索
        $item = RoomsMember::where('group_id', $request->group_id)->where('room_id', $request->room_id)->get();

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
    public function ValidationName(Request $request)
    {
        //DB登録済み名チェック(同じ名前登録されていないか)
        $item = RoomsMember::where('member_name', $request->member_name)->where('group_id', $request->group_id)->where('room_id', $request->room_id)->get();

        if (count($item) == 0) {
            return response()->json([
                'data' => 'true',
            ], 200);
        } else if ($item) {
            return response()->json([
                'data' => 'false'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
