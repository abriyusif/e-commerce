<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticable;
class Userdetails extends Authenticable
{
    use Notifiable;
    //
    protected $fillable = ['name','username','email','phone_number','card_no','expiry_date','cvc',
    'first_question_answer','second_question_answer','third_question_answer','password'];

}
