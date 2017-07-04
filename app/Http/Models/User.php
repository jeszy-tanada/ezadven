<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class User extends Model implements  Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact', 'role', 'password', 'is_active', 'country',
    ];
    public $rules = array(
        'first_name' => 'required|max:32|min:1',
        'last_name' => 'required|max:32|min:1',
        'country' => 'required|max:32|min:1',
        'email' => 'required|max:255|unique:user',
        'password' => 'required|min:4',
        'role' => 'required',

    );
    private $names = array(
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'email' => 'Email Address',
    'country' => 'Country',
    'password' => 'Password',
    'role' => 'Role',
    );
    private $errors;
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);
        $v->setAttributeNames($this->names);
        // check for failure
        if ($v->fails())
        {
            $this->errors = $v->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function getAuthIdentifier()
    {
        return $this->getkey();
    }
    public function getAuthIdentifierName()
    {
        return $this->getKeyName();
    }
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

//    public function order()
//    {
//        return $this->hasMany('App\Http\Models\Order');
//    }
}

