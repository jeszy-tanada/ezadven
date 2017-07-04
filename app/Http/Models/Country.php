<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;


class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'country';
    protected $fillable = [
        'name',
    ];
    public $rules = array(
        'name' => 'required|max:100',

    );
    private $names = array(
        'name' => 'Name',
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

}

