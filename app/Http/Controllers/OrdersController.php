<?php

namespace App\Http\Controllers;
use App\Orders;
use App\Products;
use DataTables;
use Response;
use DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OrdersController extends Controller
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
            $data = DB::table('orders')
            ->join('products','products.id','=','orders.product_id')
            ->join('userdetails','userdetails.email','=','orders.customer_email')->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('details',function($row){
              $details = '<span> Name : <b>' . $row->name . '</b>
              <br> Phone : <b>0' . $row->phone_number . '</b> 
              <br> Email : <b>' . $row->email . '</b> </span>';
              return $details;
            })
            ->rawColumns(['details'])
            ->make(true);
        }
    }
    public function countOrders()
    {
        $count = Orders::get()->count();
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
