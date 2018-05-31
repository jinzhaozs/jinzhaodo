<?php
/**
 * 前天主页控制器 Index.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年4月9日
*/
namespace app\index\controller;

use \think\Request;
use think\Session;
class Tucei extends \app\index\controller\Base
{
	//查询
    public function index()
    {
        //获取参数
        $request = Request::instance();
        $urlcanshu = $request->param();
        // dump($urlcanshu);die;
        // 统一变量说明
        $kongjian=db('ect_kongjian')->limit('6')->select();
        $kongjians=db('ect_kongjian')->limit('6,100')->select();
        $jubu=db('ect_jubu')->limit('6')->select();
        $jubus=db('ect_jubu')->limit('6,100')->select();
        $fengge=db('com_zhuancfg')->limit('6')->select();
        $fengges=db('com_zhuancfg')->limit('6,100')->select();
        $huxing=db('com_layout')->limit('6')->select();
        $huxings=db('com_layout')->limit('6,100')->select();
        $leixing=db('com_qiyecsleixing')->limit('6')->select();
        $leixings=db('com_qiyecsleixing')->limit('6,100')->select();
        $lbt=db('lbt')->select();

        //链接数据库赋值
        $com_leixing = $this->uri("com_qiyecsleixing",array());//类型
        $com_fuwuquyu = $this->uri("com_fuwuqy",array());//服务区域
        $com_price = $this->uri("com_price",array());//价位
        $com_fengge = $this->uri("com_zhuancfg",array());//风格
        //图册
        $tucei=db('ect_atlas')->select();
        //渲染类别信息
        $this->assign("com_leixing",$com_leixing);
        $this->assign("com_fuwuquyu",$com_fuwuquyu);
        $this->assign("com_price",$com_price);
        $this->assign("com_fengge",$com_fengge);
        // 渲染类别信息头部
        $this->assign("com_fuwuqytou",db("com_fuwuqy")->limit(6)->select());//服务区域
        $this->assign("com_pricetou",db("com_price")->limit(6)->select());//价位
        $this->assign("com_leixingtou",db("com_qiyecsleixing")->limit(6)->select());//类型
         $this->assign("com_fenggetou",db("com_zhuancfg")->limit(6)->select());//风格
         $this->assign("ect_kongjian",db("ect_kongjian")->limit(6)->select());//空间
        // $this->assign("com_suozaiqu",$com_suozaiqu);
        // dump($comtype);die;
        //渲染条件信息
       $this->assign("kongjian",$kongjian);
       $this->assign("kongjians",$kongjians);
       $this->assign("jubu",$jubu);
       $this->assign("jubus",$jubus);
       $this->assign("fengge",$fengge);
       $this->assign("fengges",$fengges);
       $this->assign("huxing",$huxing);
       $this->assign("huxings",$huxings);
       $this->assign("tucei",$tucei);
       $this->assign("leixing",$leixing);
       $this->assign("leixings",$leixings);
       $this->assign("lbt",$lbt);
        return $this->fetch();
    }
   
}
