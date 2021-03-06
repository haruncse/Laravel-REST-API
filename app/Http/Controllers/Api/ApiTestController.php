<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApiTestTable;

class ApiTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apiData=ApiTestTable::all();
        return Response()->json($apiData);
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
        $validatedData=$request->validate([
            'api_data' => 'required|unique:apitesttable|max:30'
        ]);
        $apiData=new ApiTestTable;
        $apiData->api_data=$request->api_data;
        $apiData->save();
        return Response('Inserted',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apiData=ApiTestTable::find($id);
        if($apiData!=null){
            return Response()->json($apiData,201);
          }else{
            return Response(503);
        }
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
        $validatedData=$request->validate([
            'api_data' => 'required|unique:apitesttable|max:30'
        ]);
        
        $apiData=ApiTestTable::findorfail($id);
        if($apiData!=null){
            //$apiData->api_data=$request->api_data;
            //$apiData->save();
            $apiData->update($request->all());
            return Response('Updated',201);
          }else{
            return Response(503);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apiData=ApiTestTable::find($id);
        if($apiData!=null){
            $apiData->delete();
            return Response('Deleted',201);
        }else{
            return Response(503);
        }
    }
}
