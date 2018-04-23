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
        'select_id',
        'info_id',
        'user_id',
        'result',
        'mistake_id',
        'times',
        'select_num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'result' => 'integer',
        'times' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    //答题的用户
    public function getUserAttribute(){
        return app('user')->findWithoutFail($this->user_id);
    }

    //答得题
    public function getInfoAttribute(){
        return app('info')->findWithoutFail($this->info_id);
    }

    //答得选项
    public function getSelectAttribute(){
        return app('attachinfo')->findWithoutFail($this->select_id);
    }
    
    public function info(){
        return $this->belongsTo('App\Models\Informations','info_id','id');
    }

    public function select(){
       return $this->belongsTo('App\Models\AttachInformations','select_id','id');
    }

    
}
