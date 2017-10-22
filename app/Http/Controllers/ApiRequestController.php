<?php

namespace App\Http\Controllers;

use App\ApiRequest;
use Illuminate\Http\Request;

class ApiRequestController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \Auth::guard('api')->user();

        $apiRequest = ApiRequest::where('id', $id)->where('user_id', $user->id)->first();

        $order_id = $request->order_id;
        $transaction_id = $request->transaction_id;
        $media = $request->media;
        $media_campaign = $request->media_campaign;
        $media_keyword = $request->media_keyword;
        $status = $request->status;

        $apiRequest->order_id = $order_id ? $order_id : $apiRequest->order_id;
        $apiRequest->transaction_id = $transaction_id ? $transaction_id : $apiRequest->transaction_id;
        $apiRequest->media = $media ? $media : $apiRequest->media;
        $apiRequest->media_campaign = $media_campaign ? $media_campaign : $apiRequest->media_campaign;
        $apiRequest->media_keyword = $media_keyword ? $media_keyword : $apiRequest->media_keyword;
        $apiRequest->status = $status ? $status : $apiRequest->status;

        $apiRequest->save();

        return response()->json(['status' => 'success', 'code' => 201],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
