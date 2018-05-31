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
class Tu extends \app\index\controller\Base
{
	//查询
    public function index()
    {
        //获取参数
        $kjcodes = input('kjcode');
        $jbcodes=input('jbcode'); 
        $fgcodes=input('fgcode');
        $request = Request::instance();
        $urlcanshu = $request->param();
        // dump($urlcanshu);die;
        // 统一变量说明
        $kongjian=db('ect_kongjian')->select();
        $jubu=db('ect_jubu')->limit('0,14')->select();
        $jubus=db('ect_jubu')->limit('14,100')->select();
        $fengge=db('com_zhuancfg')->select();
       //获取空间数据
        $kname=null;
        $jname=null;
        $fname=null;
       $where=array();
        $kjcode = input('kongjian'); // 获取空间 code
        if($kjcode)
        {
             $where['ect_kongjian']=$kjcode;
             $whidk['ekcode']=$kjcode;
            $kname=db('ect_kongjian')->where($whidk)->find();
        }
       
        //获取局部数据
        $jbcode= input('jubu'); //获取局部 code
        if($jbcode)
        {
             $where['ect_jubu']=array('like',"%$jbcode,%");
              $whidj['ejcode']=$jbcode;
            $jname=db('ect_jubu')->where($whidj)->find();
        }
       
        //获取风格数据
        $fgcode= input('fengge');//获取风格数据
        if($fgcode)
        {
             $where['ect_zcfg']=$fgcode;
              $whidf['zcfgcode']=$fgcode;
            $fname=db('com_zhuancfg')->where($whidf)->find();
        }
        //传
        if($kjcodes)
        {
            $where['ect_kongjian']=$kjcodes;
            $whids['ekcode']=$kjcodes;
            $kname=db('ect_kongjian')->where($whids)->find();
        }
        if($jbcodes)
        {
            $where['ect_jubu']=array('like',"%$jbcodes,%");
            $whid['ejcode']=$jbcodes;
            $jname=db('ect_jubu')->where($whid)->find();
        }
        if($fgcodes)
        {
            $where['ect_zcfg']=$fgcodes;
              $whidfs['zcfgcode']=$fgcodes;
            $fname=db('com_zhuancfg')->where($whidfs)->find();
        }
        //链接数据库赋值
        $com_leixing = $this->uri("com_qiyecsleixing",array());//类型
        $com_fuwuquyu = $this->uri("com_fuwuqy",array());//服务区域
        $com_price = $this->uri("com_price",array());//价位
        $com_fengge = $this->uri("com_zhuancfg",array());//风格
        //图册
        $tu=db('ect_photo')->where($where)->paginate(5,false,['query'=>$urlcanshu,]);
        $page=$tu->render();
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
        $this->assign("kname",$kname);
        $this->assign("jname",$jname);
        $this->assign("fname",$fname);
       $this->assign("kongjian",$kongjian);
       $this->assign("jubu",$jubu);
       $this->assign("jubus",$jubus);
       $this->assign("fengge",$fengge);
       $this->assign("tu",$tu);
       $this->assign("page",$page);
        return $this->fetch();
    }
    

}
