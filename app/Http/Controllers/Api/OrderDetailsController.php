<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\OrdersDetails;
use Validator;

class OrderDetailsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderD = OrdersDetails::all();
        return $this->sendResponse($orderD, "Success");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required', 
            'product_id' => 'required', 
            'date' => 'required|max:255', 
            'quantity' => 'required', 
            'price' => 'required',
            'total' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }

        $input = $request->all();
        $orderD = OrdersDetails::create($input);

        return $this->sendResponse($orderD, 'Item register successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderD = OrdersDetails::where('id','=',$id)->get();
        return $this->sendResponse($orderD, "Success");
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
        $input = $request->all();
        $orderD = OrdersDetails::where('id','=',$id)->update($input);
        $orderD = OrdersDetails::where('id','=',$id)->get();
        return $this->sendResponse($orderD, "Success Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderD = OrdersDetails::where('id','=',$id)->delete();
        return $this->sendResponse("", "Success Deleted");
    }
}
