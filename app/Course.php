<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class course extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name,slug,dateStart,dateEnd,status'];


    protected $guarded=  ['course_image', 'description'];

    /**
     * Change activity log event description
     *
     * @param string $eventName
     *
     * @return string
     */
    public function getDescriptionForEvent($eventName)
    {
        return __CLASS__ . " model has been {$eventName}";
    }

    public function studens()
    {
        return $this->belongsToMany(student::class);

    }

    public function lessons()
    {
        return $this->belongsToMany(lesson::class);
    }

    public function califacaciones()
    {
        return $this->belongsToMany(Quialification::class, 'quialifications');
    }
}
