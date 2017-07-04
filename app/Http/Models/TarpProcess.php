<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class TarpProcess extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tarps_processed';
    protected $fillable = [
        'name',
        'tarp_id'
    ];
    private $rules = array(
        'tarp_id' => 'required|min:1'
    );
    private $names = array(
        'name' => 'Name',
        'tarp_id' => 'Tarp to Use',

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

//    public function product()
//    {
//        return $this->belongsTo('App\Http\Models\Product');
//    }

    public function tarp(){
        return $this->belongsTo('App\Http\Models\Tarps');
    }

    public function usages(){
        return $this->hasMany('App\Http\Models\TarpUsage');
    }
}

