<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customer';
    protected $fillable = [
        'fname', 'lname', 'email', 'contact_no', 'address',
    ];
    private $rules = array(
        'fname' => 'required|max:50|min:2',
        'contact_no' => 'required|numeric'

    );
    private $names = array(
    'fname' => 'First Name',
    'contact_no' => 'Contact Number'
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

    public function order()
    {
        return $this->hasMany('App\Http\Models\Order');
    }
}

