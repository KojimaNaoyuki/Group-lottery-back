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
    public function getMemmber(Request $request)
    {
        //ルームidで検索
        $items = RoomsMember::where('group_id', $request->group_id)->where('room_id', $request->room_id)->get();

        //代表者ごとメンバー人数取得
        $memberNumArr = [];
        foreach ($items as $item) {
            if ($item['id'] == $item['group_judg'] && !$item['del_flag']) {
                $memberNum = RoomsMember::where('group_id', $request->group_id)->where('room_id', $request->room_id)->where('group_judg', $item['id'])->get();
                $memberNumArr[$item['member_name']] = array('member_num' => count($memberNum));
            }
        }

        if ($items) {
            return response()->json([
                'data' => $items,
                'memberNum' => $memberNumArr
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function getMemmberWhereJudg(Request $request)
    {
        //代表者IDで検索
        $item = RoomsMember::where('group_id', $request->group_id)->where('room_id', $request->room_id)->where('group_judg', $request->group_judg)->get();

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
    public function getLeaderId(Request $request)
    {
        //代表者IDを取得
        $item = RoomsMember::where('group_id', $request->group_id)->where('room_id', $request->room_id)->where('member_name', $request->member_name)->get();

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
