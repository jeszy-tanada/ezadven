<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'price',
        'sizeable',
    ];
    private $rules = array(
        'product_name' => 'required|max:50|min:2|unique:product',
        'price' => 'numeric',
    );
    private $names = array(
        'product_name' => 'Product Name',
        'price' => 'Price',
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


    public function product_types(){
        return $this->hasMany('App\Http\Models\ProductType');
    }

}

