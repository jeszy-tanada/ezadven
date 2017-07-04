<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Validator;
class Area extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'area';
    protected $fillable = [
        'country_id',
        'name',
        'image',

    ];
    private $rules = array(
        'country_id' => 'required|min:1|numeric',
        'name' => 'required|max:100',
        'image' => 'max:6270|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1280,min_height=720',
    );
    private $names = array(
        'country_id' => 'Country',
        'name' => 'Name'
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


//
//
//    public function update_Area(Request $request){
//        $Area = new Area();
//        $Area->payment = $request->get('payment');
//        $Area->paid = $request->get('paid');
//        $Area->discount = $request->get('discount', 0);
//        $Area->discount_type = $request->get('discount_type');
//        $Area->Area_by = 1;
//        $Area->Area_status = 1;
//    }

    public function country(){
        return $this->belongsTo('App\Http\Models\Country');
    }

//    public function Area_items(){
//        return $this->hasMany('App\Http\Models\AreaItem');
//    }
//
//    public function user(){
//        return $this->belongsTo('App\Http\Models\User');
//    }
//
//    public function updated_by(){
//        return $this->belongsTo('App\Http\Models\User');
//    }
}

