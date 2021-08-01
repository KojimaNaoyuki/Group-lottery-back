<?php

namespace App\Http\Controllers;

use App\Models\LotteryResult;
use Illuminate\Http\Request;

class LotteryResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = LotteryResult::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LotteryResult  $lotteryResult
     * @return \Illuminate\Http\Response
     */
    public function show(LotteryResult $lotteryResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LotteryResult  $lotteryResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LotteryResult $lotteryResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LotteryResult  $lotteryResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(LotteryResult $lotteryResult)
    {
        //
    }
}
