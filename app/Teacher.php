<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fio',
    ];

    /**
     * Get exams
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    /**
     * Get schedules
     */
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    /**
     * Get changes
     */
    public function changes()
    {
        return $this->hasMany('App\Change');
    }

    /**
     * Get auditory
     */
    public function auditory()
    {
        return $this->belongsTo('App\Auditory');
    }
}
