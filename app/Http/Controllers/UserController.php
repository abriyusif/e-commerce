<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Userdetails;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Response;
use Auth;
use DB;
class UserController extends Controller
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
            $data = Userdetails::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function($row){

            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.dashboard.users_list');

    }


    public function countUsers()
    {
        $count = Userdetails::get()->count();
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
    public function getUser()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            return $user;

        }
        else
        {
            return "not";
        }
    }
    public function validateQuestions(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'first_question_answer' => 'required|max:255',
             'second_question_answer' => 'required|max:255',
             'third_question_answer' => 'required|max:255',
          ]);
          if($validator->passes())
          {
              $first_answer= $request->first_question_answer;
              $second_answer = $request->second_question_answer;
              $third_answer = $request->third_question_answer;
            // $user = Auth::user();
            // echo $user['email'];
            $email = $request->email_questions;
            $check_first_question = DB::table('userdetails')
            ->where('email','=',$email)
            ->where('first_question_answer','=',$first_answer);
            $check_second_question = DB::table('userdetails')
            ->where('email','=',$email)
            ->where('second_question_answer','=',$second_answer);
            $check_third_question = DB::table('userdetails')
            ->where('email','=',$email)
            ->where('third_question_answer','=',$third_answer);

            // echo  $check_first_question->count();
            if($check_first_question->count()<1)
            {
                return response()->json(['question_errors' => 'First Question Incorrect']);
            }
            else if($check_second_question->count()<1)
            {
                return response()->json(['question_errors' => 'Second Question Incorrect']);
            }
            else if($check_third_question->count()<1)
            {
                return response()->json(['question_errors' => 'Third Question Incorrect']);
            }
            else 
            {
                return response()->json(['status' => "All Answers Correct"]);
            }
          }
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
            'name' => 'required|max:255|',
            'username' => 'required|max:255|unique:userdetails',
            'phone_number' => 'required|max:255',
            'email' => 'required|max:255|unique:userdetails',
            'password' => 'required|max:255',
            'user_confirm_password' => 'required|max:255|same:password',
            'card_no' => 'required|max:16|unique:userdetails',
            'expiry_date' => 'required|min:5|max:5',
            'cvc' => 'required|min:4|max:4',
            'first_question_answer' => 'required|max:255',
             'second_question_answer' => 'required|max:255',
             'third_question_answer' => 'required|max:255',
          ],
          [
            'email.unique' => 'Email Already Exists',
            'username.unique' => 'Username Already Exists',
            'user_confirm_password.same'=>'Password Mismatch',
            'card_no.max' => 'Card Number Invalid Length(Exceeds Maximum Length)',
            'card_no.unique' => 'Card Number Already Registered By Another User Account'
        ]);

        if($validator->passes())
        {
            //Bills::find();
         // $check = Bills::where('ref_no','=',$request->ref_no)->first();
            $users = Userdetails::Create([
                
                'name' => $request->name,
                'username' => $request->username,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'card_no' => $request->card_no,
                'expiry_date' => $request->expiry_date,
                'cvc' => $request->cvc,
                'first_question_answer' => $request->first_question_answer,
                'second_question_answer' => $request->second_question_answer,
                'third_question_answer'  => $request->third_question_answer,
                'password' => Hash::make($request->password),
               
            ]);
           
                return response()->json(['success_insert_user' => 'New User Successfully Registered']);
            }
            else
            {
                return response()->json(['user_insert_errors' => $validator->errors()->all()]);
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
