<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Quialification extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'quialifications';


        /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    
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
}
