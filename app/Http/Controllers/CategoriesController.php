<?php

namespace App\Http\Controllers;
use App\Category;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax())
        {
            $data = Category::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Edit" class="edit editCategory"><i class="icon fa fa-pencil"></i></a> &nbsp
              <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Delete" class=" btn-sm deleteCategory"><i class="icon fa fa-trash"></i></a>';
           return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.category_list');
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
        $validator = Validator::make($request->all(),[
            'category_name' => 'required|max:255|unique:categories'],
            [
              'category_name.unique' => 'Category Already Exists'
            
        ]);
        if($validator->passes())
        {
            //$slug = str_slug($request->category_name);
            $categories = Category::Create([
                'category_name' => $request->category_name,
                'description' => $request->category_description
            ]);
            return response()->json(['success' => 'New Category Added Successfully']);

        }
        else
        {
            return response()->json(['category_insert_errors' => $validator->errors()]);
        }
    }

    public function getCategories(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $categories=Category::orderby('id','DESC')->select('id','category_name')->get();
        }
        else
        {
            $categories=Category::orderby('id','DESC')->select('id','category_name')->where('category_name','like','%' . $search . '%')->get();
        }
        //echo $categories->count();
        $response = array();
        foreach($categories as $category)
        {
            $response[] = array(
                "id" => $category->category_name,
                "text" => $category->category_name
            );
        }
        echo json_encode($response);
    }
    public function getCats(Request $request)
    {
       
        
            $categories=Category::orderby('id','DESC')->select('id','category_name')->get();
        
        //echo $categories->count();
        $response = array();
        foreach($categories as $category)
        {
            $response[] = array(
                "id" => $category->id,
                "text" => $category->category_name
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
        $category = Category::find($id);
        return response()->json($category);
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
            'category_nameu' => 'required|max:255']);
            if($validator->passes())
            {
                $form_data =array(
                    'category_name' => $request->category_nameu,
                    'description' => $request->category_descriptionu
      
                );
                Category::whereId($request->hidden_category_id)->update($form_data);
                return response()->json(['success_category_update' => 'Data Successfully Updated']);
            }
            else
            {
                return response()->json(['category_update_errors' => $validator->errors()->all()]);
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
        $data = Category::findOrFail($id);
        $data->delete();
    }
}
