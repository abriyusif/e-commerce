<?php

namespace App\Http\Controllers;
use App\SubCategory;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class SubCategoriesController extends Controller
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
             $data = SubCategory::latest()->get();
             return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action',function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Edit" class="edit editSubCategory"><i class="icon fa fa-pencil"></i></a> &nbsp
                <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Delete" class=" btn-sm deleteSubCategory"><i class="icon fa fa-trash"></i></a>';
            return $btn;
             })
             ->rawColumns(['action'])
             ->make(true);
         }
         return view('admin.sub_category_list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'sub_category_name' => 'required|max:255|unique:sub_categories'],
            [
              'sub_category_name.unique' => 'Sub Category Already Exists'
            
        ]);
        if($validator->passes())
        {
            //$slug = str_slug($request->sub_category_name);
            $categories = SubCategory::Create([
                'sub_category_name' => $request->sub_category_name,
                'description' => $request->sub_category_description
            ]);
            return response()->json(['sub_categorys_uccess' => 'New Sub Category Added Successfully']);

        }
        else
        {
            return response()->json(['sub_category_insert_errors' => $validator->errors()]);
        }
    }
    public function getSubs(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $categories=SubCategory::orderby('id','DESC')->select('id','sub_category_name')->get();
        }
        else
        {
            $categories=SubCategory::orderby('id','DESC')->select('id','sub_category_name')->where('sub_category_name','like','%' . $search . '%')->get();
        }
        //echo $categories->count();
        $response = array();
        foreach($categories as $category)
        {
            $response[] = array(
                "id" => $category->sub_category_name,
                "text" => $category->sub_category_name
            );
        }
        echo json_encode($response);
    }
    public function getSubCats(Request $request)
    {
        
            $categories=SubCategory::orderby('id','DESC')->select('id','sub_category_name')->get();
        
        //echo $categories->count();
        $response = array();
        foreach($categories as $category)
        {
            $response[] = array(
                "id" => $category->id,
                "text" => $category->sub_category_name
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
        $subcategory = SubCategory::find($id);
        return response()->json($subcategory);
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
            'sub_category_nameu' => 'required|max:255']);
            if($validator->passes())
            {
                $form_data =array(
                    'sub_category_name' => $request->sub_category_nameu,
                    'description' => $request->sub_category_descriptionu
      
                );
                SubCategory::whereId($request->hidden_sub_category_id)->update($form_data);
                return response()->json(['success_sub_category_update' => 'Data Successfully Updated']);
            }
            else
            {
                return response()->json(['sub_category_update_errors' => $validator->errors()->all()]);
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
        $data = SubCategory::findOrFail($id);
        $data->delete();
    }
}
