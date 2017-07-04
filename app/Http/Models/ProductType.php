<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class ProductType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'product_type';
    protected $fillable = [
        'product_id',
        'type_name',
        'price_adjustment',
    ];
    private $rules = array(
        'product_id' => 'required',
        'type_name' => 'required|max:50|min:2',
        'price_adjustment' => 'required|max:11|min:1',
    );
    private $names = array(
        'product_id' => 'Product',
        'type_name' => 'Type Name',
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

    public function product()
    {
        return $this->belongsTo('App\Http\Models\Product');
    }

}

