<?php

namespace App\Repositories;

use App\Models\Result;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ResultRepository
 * @package App\Repositories
 * @version April 18, 2018, 10:12 pm CST
 *
 * @method Result findWithoutFail($id, $columns = ['*'])
 * @method Result find($id, $columns = ['*'])
 * @method Result first($columns = ['*'])
*/
class ResultRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'result',
        'type',
        'times'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Result::class;
    }

    /**
     *结束接口
     */
     public function endInfosApi($token,$input){
        
             if(app('user')->findWithoutFail($token)){

                 $input['user_id']=$token;

                if(array_key_exists('result', $input)  && $input['result'] >= 0 && $input['result'] <= 100 && array_key_exists('type', $input) && !empty($input['type'])  &&  array_key_exists('times', $input) && !empty($input['times'])  ){

                    Result::create($input);

                    return ['state'=>0,'message'=>'回应成功'];

                }
                else{
                    return ['state'=>1,'message'=>'参数不完整!'];
                }   

             }
             else{
                return ['state'=>1,'message'=>'用户token信息错误！'];
             }
     }  
}
