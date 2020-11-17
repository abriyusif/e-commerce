<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Validator;
use DB;
use DataTables;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data=products::latest('vehicles');
        if($request->ajax())
        {
            $data=products::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('edit',function($row)
            {
              $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
  
              
          return $btn;
            })
            ->addIndexColumn()
            ->addColumn('delete',function($row2){
              $btn2 = ' <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row2->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteVehicle">Remove</a>';
            return $btn2;
          })->rawColumns(['edit','delete'])
            
            ->make(true);
            
        }
        return view('admin.dashboard.index',compact('data'));
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

         //
      $validator=  Validator::make($request->all(),[
        'product_code' => 'required|max:255|unique:products',
        'product_category' => 'required|max:255',
        'product_brand' => 'required|max:255',
        'product_name' => 'required|unique:products',
        'product_description' => 'required',
        'purchase_price' => 'required',
        'selling_price' => 'required',
        'product_quantity' => 'required',
        'img' => 'required',
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
  ],
[
    'product_code.unique' => 'Product Code Belongs To Another Product'
]);
    
    if($validator->passes())
    {
        if($request->hasFile('img'))
    {
        //$allowedfileExtension=['jpg','png','png'];
        $file = $request->file('img');
        
        
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $destinationPath='public/uploads/'; //Upload Path
            $profileImage = rand() .  "." . $extension;
            $file->move($destinationPath,$profileImage);
            $data[] = $profileImage;
        
            
        
    }
    $product = Products::Create([
        'product_code' => $request->product_code,
        'product_category' => $request->product_category,
        'product_brand' => $request->product_brand,
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'purchase_price' => $request->purchase_price,
        'selling_price' => $request->selling_price,
        'product_quantity' => $request->product_quantity,
        'product_image' => $profileImage
      
    ]);
        return response()->json(['success' => 'New Product Successfully Registered']);
    }
    else
    {
        return response()->json(['error' => $validator->errors()->all()]);
    }
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
        //
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
