<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait, RemindableTrait;

    /** fillable fields prevent mass assignment exception
     * @var array
     */
    protected $fillable = ['username', 'password', 'email', 'user_role', 'recstat'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /** validation rules
     * @var array
     */
    public static $rules = array(
        'username' => 'required|unique:users|alpha_dash|min:4',
        'password' => 'required|alpha_num|between:4,8|confirmed',
        'password_confirmation' => 'required|alpha_num|between:4,8'
    );

}