<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Validator;
class TarpSpoils extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tarp_spoils';
    protected $fillable = [
        'length',
        'width',

    ];
    private $rules = array(
        'length' => 'required|numeric|min:1',
        'width' => 'required|numeric|min:1',
    );
    private $names = array(
        'length' => 'Length',
        'width' => 'Width',
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


    public function usage(){
        return $this->belongsTo('App\Http\Models\TarpUsage');
    }


//
//    public function updated_by(){
//        return $this->belongsTo('App\Http\Models\User');
//    }
}

