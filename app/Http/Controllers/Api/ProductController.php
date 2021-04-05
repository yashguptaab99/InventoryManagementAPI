<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return $this->sendResponse($product, "Success");
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
            'category_id' => 'required', 
            'product_name' => 'required|max:255', 
            'product_code' => 'required|unique:products|max:255', 
            'buying_price' => 'required', 
            'selling_price' => 'required', 
            'supplier_id' => 'required', 
            'buying_date' => 'required', 
            'product_quantity' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }

        $input = $request->all();
        $product = Product::create($input);

        return $this->sendResponse($product, 'Product register successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id','=',$id)->get();
        $product[0]->category = Product::find($id)->category;
        $product[0]->supplier = Product::find($id)->supplier;
        return $this->sendResponse($product, "Success");
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
        $product = Product::where('id','=',$id)->update($input);
        $product = Product::where('id','=',$id)->get();
        return $this->sendResponse($product, "Success Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id','=',$id)->delete();
        return $this->sendResponse("", "Success Deleted");
    }
}
