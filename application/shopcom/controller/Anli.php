<?php
/**
 * 前天主页控制器 Index.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年5月2日
*/
namespace app\shopcom\controller;

use \think\Request;

class Anli extends \app\shopcom\controller\Base
{
	//查询
    //
    public function index()
    {
        //获取商家id
        $comid = input('comid');
        // dump($comid);
        $whereshangjia['id'] = $comid;
        //获取商家信息
        $shopcom = $this->uri("shop",$whereshangjia);
        //该商家案例信息
        //获取参数
        $request = Request::instance();
        $urlcanshu = $request->param();
        // dump($urlcanshu);die;
        // 统一变量说明
        $tjffengge = null;//条件参数风格
        $tjfhuxing = null;//条件参数户型

        //风格数组
        $ffengge = input('ffengge'); // 获取类型 code
        if ($ffengge) {
            $tjffengge = $ffengge;//type 的code
            // dump($thpename);
            $where['ffengge'] = $ffengge;
        }
        //户型条件
        $fhuxing = input('fhuxing'); // 获取类型 code
        if ($fhuxing) {
            $tjfhuxing = $fhuxing;//type 的code
            // dump($thpename);
            $where['fhuxing'] = $fhuxing;
        }
        $plan = db("plan");//方案
        $where['plan.comid'] = $comid;
         $where['schedule'] =5;
        $res = $plan->field("plan.id,plan.fname,plan.time,plan.flogo,plan.frenyuan,plan.fmianji,plan.fyusuan,plan.ffangshi,lx.lxname as ftype,shop.id as comid,com_layout.lname as fhuxing,com_zhuancfg.zcfgname as ffengge,designer.dname as frenyuan")
        ->join('com_qiyecsleixing lx','plan.ftype = lx.lxcode','left')//类型
        ->join('shop','plan.comid = shop.id','left')//公司
        ->join('com_layout','plan.fhuxing = com_layout.lcode','left')//户型
        ->join('com_zhuancfg','plan.ffengge = com_zhuancfg.zcfgcode','left')//风格
        ->join('designer','plan.frenyuan = designer.id','left')//设计师
        ->order("plan.id")
        ->where($where)
        ->select(); 
        // dump($res);die;
        // 分页
        $this->assign("res",$res);//案例信息
        $this->assign("tjfhuxing",$tjfhuxing);//条件户型
        $this->assign("tjffengge",$tjffengge);//条件风格
        $this->assign("shopcomhuxing",db("com_layout")->limit(5)->select());//户型信息
        $this->assign("shopcomfengge",db("com_zhuancfg")->limit(5)->select());//风格信息
        $this->assign("shopcom",$shopcom);//商家信息
        $this->assign("comid",$comid);//商家信息id
        return $this->fetch();
    }
    //测试
    public function aa(){
        return $this->fetch();
    }
}