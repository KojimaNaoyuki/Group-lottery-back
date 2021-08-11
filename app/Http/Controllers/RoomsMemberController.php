<?php

namespace App\Http\Controllers;

use App\Models\RoomsMember;
use Illuminate\Http\Request;

class RoomsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //全件取得
        $items = RoomsMember::all();

        return response()->json([
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = RoomsMember::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomsMember  $roomsMember
     * @return \Illuminate\Http\Response
     */
    public function show(RoomsMember $roomsMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomsMember  $roomsMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomsMember $roomsMember)
    {
        //del_flagを更新する
        $update = [
            'del_flag' => $request->del_flag
        ];
        info($roomsMember->id);

        $item = RoomsMember::where('id', $request->id)->update($update);

        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomsMember  $roomsMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomsMember $roomsMember)
    {
        //
    }
}
