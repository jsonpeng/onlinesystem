<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;



class ApiController extends Controller
{


    public function __construct(
    	
    )
    {
        
    }

    
    /**
     *根据题目(infomations)的id获取到它关联的选项
     *$id 题目的id
     *$status 要的类型 1详情内容 0只要选项
     */
    public function getInfoSelectById(Request $request,$id,$status=true)
    {

    	if(!empty($id)){
    		return ['state'=>0,'message'=>app('info')->getInfoSelectById($id,$status)];
    	}
    	else{
    		return ['state'=>1,'message'=>'参数错误,缺少题目id'];
    	}
   	
    }



}
