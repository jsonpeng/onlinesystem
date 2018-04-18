<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Informations
 * @package App\Models
 * @version April 18, 2018, 9:38 pm CST
 *
 * @property string title
 * @property integer type
 * @property string analysis
 * @property integer sort
 * @property string content
 */
class Informations extends Model
{
    use SoftDeletes;

    public $table = 'informations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'type',
        'analysis',
        'sort',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'type' => 'integer',
        'analysis' => 'string',
        'sort' => 'integer',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
