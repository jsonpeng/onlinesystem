<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Mail;
use Config;

class ApiController extends Controller
{


    public function __construct(
    	
    )
    {
        
    }

    /**
     *发送邮箱验证码
     */
    public function sendEmailCode(Request $request){
            //d(Config::get('mail'));
            $email=$request->input('email');
            $code=rand(1000,9999);
            //保存验证码到session中去
            session()->put('code',$code);

            if(!empty($email)){
                  Mail::send('emails.index',['code'=>$code],function($message) use ($email){ 
                    $to = $email;
                    $message ->to($to)->subject('【在线测试系统】邮箱验证码');
                });
                return ['state'=>0,'message'=>'发送成功'];
            }else{
            return ['state'=>1,'message'=>'请输入邮箱'];
          }
    }

    /**
     *注册新用户
     */
    public function regNewUser(Request $request){
        $input=$request->all();
        //邮箱
        $email=$input['email'];
        //先检验邮箱
        if(!empty($email)){

            if(app('user')->model()::where('email',$email)->count()){
                return ['state'=>1,'message'=>'该邮箱已被注册过,请替换邮箱'];
            }

        }else{
            return ['state'=>1,'message'=>'请输入邮箱'];
        }

        //再检验验证码是否匹配
        if($input['code']!=session('code')){
            return ['state'=>1,'message'=>'邮箱验证码不正确！'];
        }

        if(!empty($input['name'] && !empty($input['password']))){
            app('user')->create($input);
            return ['state'=>0,'message'=>'注册成功'];
        }else{
            return ['state'=>1,'message'=>'参数不完整！'];
        }
    } 
    /**
        用户登录
    **/
        public function loginUser(Request $request){

            $input = $request->all();
            $name  = $input['name'];
            $password =$input['password'];
            $user=app('user')->model()::where('name',$name)->where('password',$password);
            if($user->count()){
                return ['state'=>0,'message'=>['data'=>'登录成功','token'=>$user->first()->id] ];
            }else{
                return ['state'=>1,'message'=>'用户名或者密码不匹配！'];
            }

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


    /*
    * 给题接口
        $type 题目类型，0 科目一；1科目四 不传默认取科一
        $token 用户id
    */
    public function getInfoApi(Request $request,$token,$type=0){
            return app('info')->givenUserInfosWithToken($type,$token);
    } 

    /*
     *答题记录接口
        $token 用户id
     */
    public function AnswerRecountApi(Request $request,$token){
        return app('recountinfo')->AnswerRecountApi($token,$request->all());
    }

    /**
     *答题结束接口
     */
    public function endInfosApi(Request $request,$token){
        return app('result')->endInfosApi($token,$request->all());
    }

    /**
     *错题册
     */
    public function mistakeRecount(Request $request,$token,$times=0){
        return app('recountinfo')->mistakeRecount($token,$times);

    }
}
