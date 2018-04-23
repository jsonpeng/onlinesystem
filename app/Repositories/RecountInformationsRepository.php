<?php

namespace App\Repositories;

use App\Models\RecountInformations;
use App\Models\Informations;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RecountInformationsRepository
 * @package App\Repositories
 * @version April 18, 2018, 10:02 pm CST
 *
 * @method RecountInformations findWithoutFail($id, $columns = ['*'])
 * @method RecountInformations find($id, $columns = ['*'])
 * @method RecountInformations first($columns = ['*'])
*/
class RecountInformationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'select_id',
        'info_id',
        'user_id',
        'result',
        'mistake_id',
        'times',
        'select_num'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RecountInformations::class;
    }

    //答题记录接口
    public function AnswerRecountApi($token,$input){

        if(app('user')->findWithoutFail($token)){
                $result=0;
                $input['user_id']=$token;

                //提交内容
                $select_content=app('attachinfo')->findWithoutFail($input['select_id']);

                //如果没找到内容
                if(empty($select_content)){
                    return ['state'=>1,'message'=>'该选项不存在!'];
                }

                //题目的内容
                $timu_content=app('info')->findWithoutFail($input['info_id']);

                //如果没找到内容
                if(empty($timu_content)){
                    return ['state'=>1,'message'=>'该题目不存在!'];
                }

                //先存入提交信息记录
                $rec_info=RecountInformations::create($input);
                #然后判断答案是不是正确的
                //提交的内容
                $tijiao_content=$select_content->content;
                //答案
                $daan=$timu_content->content;
                if($tijiao_content === $daan){
                    #对了
                    $rec_info->update(['result'=>$result]);

                }
                else{
                    $result=1;
                    #错了
                    $rec_info->update(['result'=>$result]);
                }

                return ['state'=>$result,'message'=>$result?'答题错误':'答题正确'];

        }
        else{
            return ['state'=>1,'message'=>'用户token信息错误！'];
        }

    }

    //错题册
    public function mistakeRecount($token,$times){

            if(app('user')->findWithoutFail($token)){

                empty($times)
                ?
                $mistake=RecountInformations::where('user_id',$token)->where('result',1)
                        ->with('info')
                        ->with('select')
                        ->get()
                :
                $mistake=RecountInformations::where('user_id',$token)->where('result',1)->where('times',$times)
                        ->with('info')
                        ->with('select')
                        ->get();

                return ['state'=>0,'message'=>$mistake];

            }else{
                return ['state'=>1,'message'=>'用户token信息错误！'];
            }
    }

}
