<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pair_number', 'date'
    ];

    /**
     * Get the auditory for this change
     */
    public function auditory()
    {
        return $this->belongsTo('App\Auditory');
    }

    /**
     * Get the group for this change
     */
    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    /**
     * Get the subject for this change
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    /**
     * Get the teacher for this change
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    /**
     * Get the class number and time for this change
     */
    public function pair()
    {
        return $this->belongsTo('App\Pair');
    }
}
