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
class Tcei extends \app\index\controller\Base
{
	//查询
    public function index()
    {
        //获取参数
         $fgcodes = input('fgcode');
         $lcodes=input('lcode');
         $lxcodes=input('lxcode'); 
         $mjcodes=input('mjcode');
        $request = Request::instance();
        $urlcanshu = $request->param();
        $fgname=null;
        $lname=null;
        $lxname=null;
        $mjname=null;
        $where=array();
        // dump($urlcanshu);die;
        // 统一变量说明
        $huxing=db('com_layout')->select();
        $mianji=db('ect_mianji')->select();
        $fengge=db('com_zhuancfg')->limit('0,14')->select();
        $leixing=db('com_qiyecsleixing')->limit('0,14')->select();
        $leixings=db('com_qiyecsleixing')->limit('14,50')->select();
       //获取户型数据
        $hxcode = input('huxing');// 获取户型code
        if($hxcode)
        {
            $where['hxcode']=array('like',"%$hxcode,%");
            $whidh['lcode']=$hxcode;
             $lname=db('com_layout')->where($whidh)->find();
        }
        
        //获取面积数据
        $mjcode= input('mianji'); //获取局部 code
        if($mjcode)
        {
            $where['mjcode']=array('like',"%$mjcode,%");
            $whidmj['emcode']=$mjcode;
             $mjname=db('ect_mianji')->where($whidmj)->find();   
        }
        //获取风格数据
        $fgcode= input('fengge');//获取风格数据
        if($fgcode)
        {
            $where['fgcode']=array('like',"%$fgcode,%");
            $whid['zcfgcode']=$fgcode;
             $fgname=db('com_zhuancfg')->where($whid)->find();

        }
        
        //获取类型
        $lxcode=input('lxcode');
        if($lxcode)
        {
             $where['lxcode']=$lxcode;
             $whides['lxcode']=$lxcode;
            $lxname=db('com_qiyecsleixing')->where($whides)->find();
        }
        //传
        if($fgcodes)
        {
            $where['fgcode']=array('like',"%$fgcodes,%");
            $whid['zcfgcode']=$fgcodes;
             $fgname=db('com_zhuancfg')->where($whid)->find();
        }
        if($lcodes)
        {
             $where['hxcode']=array('like',"%$lcodes,%");
             $whids['lcode']=$lcodes;
             $lname=db('com_layout')->where($whids)->find();
        }
        if($lxcodes)
        {
            $where['lxcode']=$lxcodes;
            $whides['lxcode']=$lxcodes;
            $lxname=db('com_qiyecsleixing')->where($whides)->find();
        }
         if($mjcodes)
        {
             $where['mjcode']=array('like',"%$lcodes,%");
             $whidmm['emcode']=$mjcodes;
             $mjname=db('ect_mianji')->where($whidmm)->find();
        }
        //链接数据库赋值
        $com_leixing = $this->uri("com_qiyecsleixing",array());//类型
        $com_fuwuquyu = $this->uri("com_fuwuqy",array());//服务区域
        $com_price = $this->uri("com_price",array());//价位
        $com_fengge = $this->uri("com_zhuancfg",array());//风格
        //图册
        $tucei=db('ect_atlas')->where($where)->paginate(50,false,['query'=>$urlcanshu,]);
         $page=$tucei->render();
         $tucei=$tucei->all();
         foreach($tucei as $k=>$v){
            $map['extatlas'] = $v['id'];
               $an=db('ect_photo')->where($map)->select();
               $tucei[$k]['zhang']=count($an);
           }
        // dump($tucei);die;
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
        $this->assign("fgname",$fgname);
       $this->assign("lname",$lname);
       $this->assign("lxname",$lxname);
       $this->assign("mjname",$mjname);
       $this->assign("huxing",$huxing);
       $this->assign("mianji",$mianji);
       $this->assign("fengge",$fengge);
       $this->assign("leixing",$leixing);
       $this->assign("leixings",$leixings);
       $this->assign("tucei",$tucei);
       $this->assign("page",$page);
        return $this->fetch();
    }
    
    
}
