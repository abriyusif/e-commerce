<?php

namespace App\Http\Controllers;
use App\Messages;
use Response;
use DataTables;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
            $data = Messages::latest()->get();
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
            'contact_name' => 'required|max:255',
            'contact_subject' => 'required|max:255',
            'contact_email' => 'required|max:255',
            'contact_message' => 'required|max:255',
        ]);
        if($validator->passes())
        {
            //$slug = str_slug($request->sub_category_name);
            $categories = Messages::Create([
                'name' => $request->contact_name,
                'subject' => $request->contact_subject,
                'email' => $request->contact_email,
                'message' => $request->contact_message
            ]);
            return response()->json(['message_success' => 'Message Successfully Sent']);

        }
        else
        {
            return response()->json(['message_errors' => $validator->errors()]);
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
