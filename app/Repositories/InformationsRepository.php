<?php

namespace App\Repositories;

use App\Models\Informations;
use InfyOm\Generator\Common\BaseRepository;
use App\Models\AttachInformations;

/**
 * Class InformationsRepository
 * @package App\Repositories
 * @version April 18, 2018, 9:38 pm CST
 *
 * @method Informations findWithoutFail($id, $columns = ['*'])
 * @method Informations find($id, $columns = ['*'])
 * @method Informations first($columns = ['*'])
*/
class InformationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'type',
        'analysis',
        'sort',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Informations::class;
    }

    // 根据题目(infomations)的id获取到它关联的选项
    public function getInfoSelectById($id,$return_detail=true){
        $info=$this->findWithoutFail($id);
        if(!empty($info)){
            if($return_detail){
                 $select=$info->select()->orderBy('num','asc')->get();
            }else{
             $select=$info->select()->select('type')->orderBy('num','asc')->get();
             $arr=[];
                foreach ($select as $key => $value) {
                    $arr[]=$value['type'];
                }
                $select=$arr;
            }
            return $select;
        }else{
            return [];
        }
    }

    //给题接口
    public function givenUserInfosWithToken($type,$token,$html=false){
        if($html){
            $infos=Informations::where('type',$type)->with('select')->get();
            $html_attr='';
           foreach ($infos as $k => $v) {
               $html_attr .='<a>题目:'.$v->title.',选项:'.$v['select'].'</a> <br />';
           }
           return $html_attr;
        }

        //该用户token存在
        if(app('user')->findWithoutFail($token)){
            return ['state'=>0,'message'=>Informations::where('type',$type)->with('select')->get()];
        }else{
            return ['state'=>1,'message'=>'用户token信息错误！'];
        }


    }

}
