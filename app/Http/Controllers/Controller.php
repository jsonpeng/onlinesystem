<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
      /**
     * 获取分页数目
     * @return [int] [分页数目]
     */
    public function defaultPage(){
        return 6;
    }

    /**
     * 验证是否展开
     * @return [int] [是否展开tools 0不展开 1展开]
     */
    public function varifyTools($input,$order=false){
        $tools=0;
        if(count($input)){
            $tools=1;
            if(array_key_exists('page', $input) && count($input)==1) {
                $tools = 0;
            }
            if($order){
                if(array_key_exists('menu_type', $input) && count($input)==1) {
                    $tools = 0;
                }
            }
        }
        return $tools;
    }

    /**
     * 倒序显示带分页
     */
    public function descAndPaginateToShow($obj){
       if(!empty($obj)){
      		return $obj->orderBy('created_at','desc')->paginate($this->defaultPage());
	    }else{
	        return [];
	    }
    }

    /**
     * 查询索引初始化状态
     */
    public function defaultSearchState($obj,$admin=false){
         if(!empty($obj)){

            return  $admin?$obj::where('name','<>','管理员'):$obj::where('id','>',0);

         }else{
            return [];
         }
  	}
}
