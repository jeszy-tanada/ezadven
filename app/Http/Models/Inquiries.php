<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Inquiries extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'inquiries';
    protected $fillable = [
        'name',
        'email',
        'contact',
        'question',
        'is_ok',
        'is_done',
        'tour_id'

    ];
    private $rules = array(
        'name' => 'required|min:2|max:255',
        'email' => 'required|min:6|max:255',
        'contact' => 'required|min:7',
        'is_ok' => 'boolean',
        'is_done' => 'boolean',
        'tour_id' => 'required|numeric',
    );
    private $names = array(
        'name' => 'Name',
        'email' => 'Email Address',
        'contact' => 'Contact Number(s)',
        'tour_id' => 'Tour'
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

    public function tour()
    {
        return $this->belongsTo('App\Http\Models\Tour');
    }

}

