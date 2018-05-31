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
class Tuceixq extends \app\index\controller\Base
{
	//查询
    public function index()
    {
        //获取参数
       
       
         $tcid = input('tcid');
         $tid=input('tid');
         $tcname=input('tcname');
         $tname=input('tname');
       

         if($tcid)
         { 
            $where['extatlas']=$tcid;
            $whid['id']=$tcid;
            $da['id']=array("gt",$tcid);
            $front=db('ect_atlas')->where($da)->order('id asc')->limit('1')->find();//上一篇
           $after=db('ect_atlas')->where("id<".$tcid)->order('id desc')->limit('1')->find();//下一篇
         }
         if($tid)
         { 
            $where['extatlas']=$tid;
            $whid['id']=$tid;
            $front=db('ect_atlas')->where("id>".$tid)->order('id asc')->limit('1')->find();//上一篇
           $after=db('ect_atlas')->where("id<".$tid)->order('id desc')->limit('1')->find();
         }
         
         $tcxq=db('ect_photo')->where($where)->select();
         //热门标签
         $pizza='';
         foreach ($tcxq as $key => $value) {
          $pizza=$pizza.$value['ect_remen'];
           
        
         } 
          $pieces = explode(",", $pizza);
         $rmbq= array_filter($pieces);
        
         $tucei=db('ect_atlas')->where($whid)->find();
         //标签面积
         $mian=$tucei['mjcode'];
         $mji['emcode']=substr($mian , 0 , 3);
         $mj=db('ect_mianji')->where($mji)->find();
         //标签户型
         $hu=$tucei['hxcode'];
         $huxing['lcode']=substr($hu , 0 , 3);
         $hx=db('com_layout')->where($huxing)->find();
         //标签风格
         $feng=$tucei['fgcode'];
         $fengs=substr($feng , 0 , 3);
         $fengge['zcfgcode']=$fengs;
         $fg=db('com_zhuancfg')->where($fengge)->find();
         //大家都在看
         $tc=db('ect_atlas')->select();
         //相关图册
         $fen['fgcode']=array('like',"%$fengs,%");
         $xgtc=db('ect_atlas')->where($fen)->limit('9')->select();
         //相关图片
         $fens['ect_zcfg']=$fengs;
         $xgt=db('ect_photo')->where($fens)->limit('9')->select();
          //$images_array = array("http://static.zend.com/img/logo.gif");
        $kongjian=db('ect_kongjian')->select();
        $jubu=db('ect_jubu')->limit('14')->select();
        $fengge=db('com_zhuancfg')->select();
        $huxing=db('com_layout')->select();
        $mianji=db('ect_mianji')->select();
        
        //链接数据库赋值
        $com_leixing = $this->uri("com_qiyecsleixing",array());//类型
        $com_fuwuquyu = $this->uri("com_fuwuqy",array());//服务区域
        $com_price = $this->uri("com_price",array());//价位
        $com_fengge = $this->uri("com_zhuancfg",array());//风格
        //图册
       
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
        $this->assign("mj",$mj);
        $this->assign("fg",$fg);
        $this->assign("hx",$hx);
        $this->assign("kongjian",$kongjian);
        $this->assign("jubu",$jubu);
        $this->assign("fengge",$fengge);
        $this->assign("huxing",$huxing);
        $this->assign("mianji",$mianji);
        $this->assign("tcid",$tcid);
        $this->assign("tid",$tid);
        $this->assign("tname",$tname);
        $this->assign("tcname",$tcname);
        $this->assign("tcxq",$tcxq);
        $this->assign("tc",$tc);
        $this->assign("xgtc",$xgtc);
        $this->assign("xgt",$xgt);
        $this->assign("front",$front);
        $this->assign("after",$after);
        $this->assign("pr",db('province')->select());//省信息
        $this->assign("rmbq",$rmbq);//热门标签
        return $this->fetch();
    }
   
}
