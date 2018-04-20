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

}
