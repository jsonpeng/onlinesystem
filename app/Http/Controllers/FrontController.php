<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;

use Mail;
use App\Models\Post;

class FrontController extends Controller
{


    public function __construct(
    	
    )
    {
        
    }

    // 首页
    public function index(Request $request)
    {
    	return view('front.index');
          
    }

    public function submitInfo(Request $request)
    {
        $name=$request->get('name');
        $tel=$request->get('tel');
        $info=$request->get('info');
        $this->messageRepository->create([
            'name'=>$name,
            'tel'=>$tel,
            'info'=>$info
        ]);


        Mail::send('emails.index',['tel'=>$tel,'info'=>$info],function($message){
            $to =$this->settingRepository->findWithoutFail(1)->email;
            $message ->to($to)->subject('预约试听体验课成功');
        });

        return ['status'=>true,'msg'=>'提交成功'];
    }

}
