<?php
/**
 * 前天攻略主页控制器 Index.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年4月9日
*/
namespace app\index\controller;

use \think\Request;
use think\Session;
use \think\Db;
class Gonglue extends \app\index\controller\Base
{
    // 初始化
    public function _initialize()
    {
          // 渲染类别信息头部
        $this->assign("com_fuwuqytou",db("com_fuwuqy")->limit(6)->select());//服务区域
        $this->assign("com_pricetou",db("com_price")->limit(6)->select());//价位
        $this->assign("com_leixingtou",db("com_qiyecsleixing")->limit(6)->select());//类型
        $this->assign("com_fenggetou",db("com_zhuancfg")->limit(6)->select());//风格
        $this->assign("ect_kongjian",db("ect_kongjian")->limit(6)->select());//空间
    }
    //攻略首页
    public function index()
    {
       
        /**
         * 轮播图
         */
        $wherelbt['comid'] = 123456789;
        $lbt = $this->uri("shop_lbt",$wherelbt);
        // dump($lbt);die;
        $this->assign("lbt",$lbt);//轮播图信息
        /**
         * 类别内容
         * @var [type]
         */
        $user = db('str_zhulei');
        $reslb = $user->field("id,name")
        ->select();
        //子类别内容
        foreach ($reslb as $k => $v) {
            $wherezl['zlid'] = $v['id'];
            //类别副标信息
            $reszlb = db('str_fuleibie')->where($wherezl)->select();
            $reslb[$k]['zlbsel'] = $reszlb;
            // 主类 下的内容 头条 攻略
            $neirongtoutiao = db('str_strate')->where(['ztyid'=>$v['id'],'type'=>6])->limit(5)->find();
            // 主类 下的内容 推荐 攻略
            $neirongtuijian = db('str_strate')->where(['ztyid'=>$v['id'],'type'=>8])->limit(4)->select();
            // dump($resneirong);die;
            $reslb[$k]['neirongtoutiao'] = $neirongtoutiao;//头条
            $reslb[$k]['neirongtuijian'] = $neirongtuijian;//推荐
            // dump($reszlb);
        }
        // dump($reslb);die;
        $this->assign("reslb",$reslb);
        return $this->fetch();
    }
    //攻略内容
    public function strateneirong(){
        // 攻略id
        $strid = input('strid');
        /**
         * 攻略主内容
         * @var [type]
         */
        $usergl = db('str_strate');
        $where['id'] = $strid;
        $resgl = $usergl->where($where)->find();
        // 头部 指示内容
        $ztyid = $resgl['ztyid'];//主类别id
        $ftyid = $resgl['ftyid'];//副类别id
        $zhuname = db('str_zhulei')->where(['id'=>$ztyid])->find();
        $funame = db('str_fuleibie')->where(['id'=>$ftyid])->find();
        // dump($funame);die;
        $funame = $funame['name'];
        $zhuname = $zhuname['name'];
        $this->assign('zhuname',$zhuname);
        $this->assign('funame',$funame);
        /**
         * 相关推荐内容
         */
        $ztyid = $resgl['ztyid'];//主类别id
        $wherexgtj['ztyid'] = $ztyid;
        $wherexgtj['type'] = 8;//普通攻略

        $resxgtjgl = $usergl->where($wherexgtj)->select();
        $this->assign("resxgtjgl",$resxgtjgl);//相关推荐内容
        /**
         * 上一篇 下一篇内容
         */
        $sqlmax = Db::query("select max(id) as id,title from str_strate where id < $strid");
        $sqlmin = Db::query("select min(id) as id,title from str_strate where id > $strid");
        $this->assign("sqlmax",$sqlmax);//上一篇
        $this->assign("sqlmin",$sqlmin);//下一篇
        // dump($sqlmin);die;
        /**
         *  攻略详情内容
         * @var [type]
         */
        $usergldetail = db('str_detail');
        $wheredetail['strid'] = $strid;
        $resdetail = $usergldetail->where($wheredetail)->select();
        // dump($resdetail);die;
        $this->assign("resdetail",$resdetail);
        $this->assign("resgl",$resgl);
        // dump($resgl);die;
        return $this->fetch();
    }
}
