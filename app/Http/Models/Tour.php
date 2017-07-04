<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Tour extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tour';
    protected $fillable = [
        'name',
        'subname',
        'image',
        'image_url',
        'min_amount',
        'max_amount',
        'area_id',
        'is_featured',
        'is_full',
        'date_from',
        'date_to',
        'description'
    ];
    private $rules = array(
        'name' => 'required|min:2|max:255',
        'subname' => 'required|min:2|max:255',
        'image' => 'max:12320|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1280,min_height=720',
        'image_url' => 'max:255',
        'min_amount' => 'numeric',
        'max_amount' => 'numeric',
        'area_id' => 'required|numeric',
        'is_full' => 'boolean',
        'is_featured' => 'boolean'
    );
    private $names = array(
        'name' => 'Name',
        'subname' => 'Subtitle',
        'area_id' => 'Area',
        'image' => 'Image'

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

    public function area()
    {
        return $this->belongsTo('App\Http\Models\Area');
    }
//    public function order(){
//        return $this->belongsTo('App\Http\Models\Order');
//    }

}

