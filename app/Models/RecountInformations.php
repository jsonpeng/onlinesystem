<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RecountInformations
 * @package App\Models
 * @version April 18, 2018, 10:02 pm CST
 *
 * @property integer user_id
 * @property integer result
 * @property string mistake_type
 * @property string mistake_conten
 * @property integer times
 * @property integer num
 */
class RecountInformations extends Model
{
    use SoftDeletes;

    public $table = 'recount_informations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'result',
        'mistake_type',
        'mistake_conten',
        'times',
        'num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'result' => 'integer',
        'mistake_type' => 'string',
        'mistake_conten' => 'string',
        'times' => 'integer',
        'num' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
