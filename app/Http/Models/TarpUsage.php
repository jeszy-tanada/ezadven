<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Validator;
class TarpUsage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tarp_usage';
    protected $fillable = [
        'length',
        'width',
        'use_length',
        'use_width',
        'tarp_process_id'

    ];
    private $rules = array(
        'length' => 'required|numeric|min:1',
        'width' => 'required|numeric|min:1',
//        'use_length' => 'required|numeric|min:1',
//        'use_width' => 'required|numeric|min:1',
    );
    private $names = array(
        'length' => 'Length',
        'width' => 'Width',
        'use_length' => 'Used Length',
        'use_width' => 'Used Width'
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

    public function user(){
        return $this->belongsTo('App\Http\Models\User');
    }

    public function processed(){
        return $this->belongsTo('App\Http\Models\TarpProcess');
    }
//
    public function spoils(){
        return $this->hasMany('App\Http\Models\TarpSpoils');
    }

//
//    public function updated_by(){
//        return $this->belongsTo('App\Http\Models\User');
//    }
}

