<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Result
 * @package App\Models
 * @version April 18, 2018, 10:12 pm CST
 *
 * @property integer user_id
 * @property integer result
 * @property string type
 */
class Result extends Model
{
    use SoftDeletes;

    public $table = 'results';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'result',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'result' => 'integer',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
