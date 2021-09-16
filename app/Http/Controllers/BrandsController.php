<?php

namespace App\Http\Controllers;
use App\Brand;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         //
         if($request->ajax())
         {
             $data =Brand::latest()->get();
             return DataTables::of($data)
             ->addIndexColumn()
             ->addColumn('action',function($row){
                 $btn =  $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Edit" class="edit editBrand"><i class="icon fa fa-pencil"></i></a> &nbsp
                 <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Delete" class=" btn-sm deleteBrand"><i class="icon fa fa-trash"></i></a>';
            return $btn;
             })
             ->rawColumns(['action'])
             ->make(true);
            // return view('admin.products.brands');
         }
         
         //return Hash::make('Base9865');
         return view('admin.brand_lists');
    }
    public function countBrands()
    {
        $count = Brand::get()->count();
        return $count;

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
        $validator = Validator::make($request->all(),[
            'brand_name' => 'required|max:255|unique:brands'
        ],
    ['brand_name.unique' => 'Brand Name Already Exists']);
    if($validator->passes())
    {
        $slug = Str::slug($request->name);
        $brands= Brand::Create([
            'brand_name' => $request->brand_name,
            'description' => $request->brand_description
        ]);
        return response()->json(['success_insert_brands' => 'New Brand Added Successfully']);
    }
    else
    {
        return response()->json(['brand_insert_errors' => $validator->errors()]);
    }
    }

    public function getBrands(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $brands = Brand::orderby('id','DESC')->select('id','brand_name')->get();
        }
        else
        {
            $brands = Brand::orderby('id','DESC')->select('id','brand_name')->where('brand_name','like','%' .$search . '%')->get();
        }
        $response = array();
        foreach($brands as $brand)
        {
            $response[] = array(
                "id" => $brand->brand_name,
                "text" => $brand->brand_name
            );
        }
        echo json_encode($response);
    }
    public function getBrans(Request $request)
    {
       
            $brands = Brand::orderby('id','DESC')->select('id','brand_name')->get();
        
        $response = array();
        foreach($brands as $brand)
        {
            $response[] = array(
                "id" => $brand->id,
                "text" => $brand->brand_name
            );
        }
        echo json_encode($response);
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
        $brand = Brand::find($id);
        return response()->json($brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'brand_nameu' => 'required|max:255'
        ]);
        if($validator->passes())
        {
            $form_data = array(
                'brand_name' => $request->brand_nameu,
                'description' => $request->brand_descriptionu
            );
            Brand::whereId($request->hidden_brand_id)->update($form_data);
            return response()->json(['success_' => 'Data Successfully Updated']);
        }
        else
        {
            return response()->json(['brand_update_errors' => $validator->errors()->all()]);
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
        //
        $data = Brand::findOrFail($id);
        $data->delete();
    }
}
