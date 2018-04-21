<?php

namespace App\Models;

use App\Models\Informations;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AttachInformations
 * @package App\Models
 * @version April 18, 2018, 9:55 pm CST
 *
 * @property string type
 * @property string content
 * @property integer info_id
 */
class AttachInformations extends Model
{
    use SoftDeletes;

    public $table = 'attach_informations';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'type',
        'content',
        'info_id',
        'num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'content' => 'string',
        'info_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    //题目
    public function getinfosAttribute(){
        return Informations::find($this->info_id);
    }


}
