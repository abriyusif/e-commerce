<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Validator;
use DB;
use DataTables;
use Stripe;
use Auth;
use Response;
use App\Orders;
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
        $data=products::latest('products');
        if($request->ajax())
        {
            $data=products::latest()->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action',function($row)
            {
              $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Edit" class="edit editProduct"><i class="icon fa fa-pencil"></i></a> &nbsp
              <a href="javascript:void(0)" data-toggle="tooltip"  id="'.$row->id.'" data-original-title="Delete" class=" btn-sm deleteProduct"><i class="icon fa fa-trash"></i></a>';
  
              
          return $btn;
            })
            ->rawColumns(['action'])
            
            ->make(true);
            
        }
        return view('admin.dashboard.index',compact('data'));
    }
    public function countProducts()
    {
        $count = products::get()->count();
        return $count;

    }
    public function fetchLatest()
{
    $data=DB::table('products')->orderBy('id','desc')->get();
    echo json_encode($data);
}
public function processPayment(Request $request)
{
    $validator=  Validator::make($request->all(),[
        'stripeToken' => 'required',
        'product_quantity' => 'required',
        'product_hidden_id' => 'required',
        'product_hidden_price' => 'required'
        
  ]); 
//   $unit_price = $request->product_hidden_price;
//   $quantity = $request->product_quantity;
//   $product_id = $request->product_hidden_id;
//   $total_amount = $unit_price * $quantity;
//   $email = $request->email_profile;
//   $sum = DB::table('orders')->where('customer_email','=',$email)->sum('total_amount');
//   $no_rows = DB::table('orders')->where('customer_email','=',$email)->count();
//   $average = $sum/$no_rows;

    if($validator->passes())
    {
        // $user = Auth::user();
        // if(Auth::check())
        // {
        //     echo "Logged In";
        // }
        // else
        // {
        //     echo "Not Logged In";
        // }
        // echo $user . "<br>";
        $unit_price = $request->product_hidden_price;
        $quantity = $request->product_quantity;
        $product_id = $request->product_hidden_id;
        $total_amount = $unit_price * $quantity;
        $email = $request->email_profile;
        $validation_status = $request->validate_status;
        $sum = DB::table('orders')->where('customer_email','=',$email)->sum('total_amount');
        $no_rows = DB::table('orders')->where('customer_email','=',$email)->count();
      //  echo $no_rows . "<br>";
        if($no_rows == 0)
        { 
            $average = $total_amount;
            
        }
        else{
            $average = $sum/$no_rows;
        }
        
        
        if($total_amount>$average && $validation_status=="notvalidated")
        {
           $statusMsg ="Changed";
           return response()->json(['change' => $statusMsg]);

        }
        else
        {
             
      // Set API key 
    Stripe\Stripe::setApiKey('sk_test_51HxIurJ6n8C3Zeylhca3gezyvRPfKakzrGn4nkl650oiNlZDf3RzmSMQOFEDmtZjNlwb1qTXwgqOADnfNTbAt4yM00cp5ClPBh'); 
     
    // Add customer to stripe 
    try {  
        $customer = Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $request->stripeToken 
        )); 
    }catch(Exception $e) {  
        $api_error = $e->getMessage();  
    } 
     
    if(empty($api_error) && $customer){  
         
        // Convert price to cents 
        $currency = "USD";
        $desc = "Product Payment";
        // Charge a credit or a debit card 
        try {  
            $charge = \Stripe\Charge::create(array( 
                'customer' => $customer->id, 
                'amount'   => $total_amount, 
                'currency' => $currency, 
                'description' => $desc 
            )); 
        }catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
         
        if(empty($api_error) && $charge){ 
         
            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize(); 
         
            // Check whether the charge is successful 
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
                // Transaction details  
                $transactionID = $chargeJson['balance_transaction']; 
                $paidAmount = $chargeJson['amount'];  
                $paidCurrency = $chargeJson['currency']; 
                $payment_status = $chargeJson['status']; 
                
                $order = Orders::Create([
                    'customer_email' => $email,
                    'product_id' => $product_id,
                    'total_amount' => $paidAmount,
                    'quantity' => $quantity,
                    'txn_id' => $transactionID,
                    'payment_status' => $payment_status
                ]);
                // If the order is successful 
                if($payment_status == 'succeeded'){ 
                    $ordStatus = 'success'; 
                    $statusMsg = '!'; 
                    return response()->json(['order_status' => 'Your Payment has been Successful']);

                }else{ 
                    $statusMsg = "Your Payment has Failed!"; 
                    return response()->json(['payment_insert_errors' => $statusMsg]);
                } 
            }else{ 
                $statusMsg = "Transaction has been failed!"; 
                return response()->json(['payment_insert_errors' => $statusMsg]);
            } 
        }else{ 
            $statusMsg = "Charge creation failed! $api_error";  
            return response()->json(['payment_insert_errors' => $statusMsg]);
        } 
    }else{  
        $statusMsg = "Invalid card details! $api_error";  
        return response()->json(['payment_insert_errors' => $statusMsg]);
    } 
        }
    
    }
    else
    {
       
            return response()->json(['payment_insert_errors' => $validator->errors()->all()]);
        
    }
    
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
        'sub_category' => 'required|max:255',
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
        'product_category' => str_replace(' ','',$request->product_category),
        'product_brand' => str_replace(' ','',$request->product_brand),
        'product_sub_category' => str_replace(' ','',$request->sub_category),
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
    public function fetchSpecificCategories()
    {
        $product_category=$_GET['mod'];
        $data = DB::table('products')->where('product_category',$product_category)->get();
        echo json_encode($data);
    }
    public function fetchSpecificBrands()
    {
        $product_brand=$_GET['mod'];
        $data = DB::table('products')->where('product_brand',$product_brand)->get();
        echo json_encode($data);
    }
    public function fetchSpecificSubCategories()
    {
        $product_sub_category=$_GET['mod'];
        $data = DB::table('products')->where('product_sub_category','=',$product_sub_category)->get();
        echo json_encode($data);
    }
    public function fetchSingleProduct(Request $request)
{
    $product_id=$request->id;
    $data = DB::table('products')->where('id',$product_id)->get();
    $json= json_encode($data);
    return view('frontend.view_product')->with('json',$json)->render();
    
}
public function getProduct(Request $request)
{
    $product_id=$request->id;
    $data = DB::table('products')->where('id',$product_id)->get();
    $json= json_encode($data);
    
    
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
        $product = Products::find($id);
        return response()->json($product);
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
        $validator=  Validator::make($request->all(),[
            'product_codeu' => 'required|max:255',
            'product_categoryu' => 'required|max:255',
            'product_brandu' => 'required|max:255',
            'sub_categoryu' => 'required|max:255',
            'product_nameu' => 'required',
            'product_descriptionu' => 'required',
            'purchase_priceu' => 'required',
            'selling_priceu' => 'required',
            'product_quantityu' => 'required',
           
      ]);
      if($validator->passes())
      {
          $form_data =array(
            'product_code' => $request->product_codeu,
            'product_category' => str_replace(' ','',$request->product_categoryu),
            'product_brand' => str_replace(' ','',$request->product_brandu),
            'product_sub_category' => str_replace(' ','',$request->sub_categoryu),
            'product_name' => $request->product_nameu,
            'product_description' => $request->product_descriptionu,
            'purchase_price' => $request->purchase_priceu,
            'selling_price' => $request->selling_priceu,
            'product_quantity' => $request->product_quantityu,

          );
          Products::whereId($request->hidden_product_id)->update($form_data);
          return response()->json(['success' => 'Data Successfully Updated']);
      }
      else
      {
          return response()->json(['error' => $validator->errors()->all()]);
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
        $data = Products::findOrFail($id);
        $data->delete();
    }
}
