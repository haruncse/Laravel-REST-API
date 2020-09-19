<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\CustomerInfo;
use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{

    public function index()
    {
        //CustomerInfo::all();
        return Response()->json(CustomerInfo::all(),201);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name'=>'required|max:35',
            'customer_code'=>'required|unique:customer_info|max:35'
        ]);

        CustomerInfo::create($request->all());
        return Response('Inserted',201);
    }


    public function show($id)
    {
        return response(CustomerInfo::findorfail($id),201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerInfo  $customerInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInfo $customerInfo)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'customer_name'=>'required|max:35',
            'customer_code'=>'required|unique:customer_info|max:35'
        ]);
        
        $customerData=CustomerInfo::findorfail($id);
        if($customerData!=null){
            $customerData->update($request->all());
            return Response('Updated',201);
          }else{
            return Response(503);
        }
    }


    public function destroy($id)
    {
        CustomerInfo::destroy($id);
        return Response("Deleted");
    }
}
