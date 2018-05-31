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

class Zixun extends \app\shopcom\controller\Base
{
    //查询
    //
    public function index()
    {
        //获取商家id
        $comid = input('comid');
        $time=date("Y-m-d");
        $where['id'] = $comid;
        $whid['ashop']=$comid;
        
        //获取服务区域列表
        //获取商家信息
        $request = Request::instance();
        $urlcanshu = $request->param();
        $grade = input('grade');
        $shopcom = $this->uri("shop",$where);
        $article=db("article")->field("id,aname,ashop,abstract,pic,content,atime")->where($whid)->order('istop asc')->order('id desc')->paginate(10,false,['query'=>$urlcanshu,]);

        $count=count($article);

         $page=$article->render();
        //$array = (array)$article;  
       //echo gettype($article);die; 
        $this->assign("page",$page);
        $this->assign("article",$article);
        $this->assign("shopcom",$shopcom);
        $this->assign("comid",$comid);
        $this->assign("count",$count);
       
        return $this->fetch();
    }
    public function xiangqing(){
        $name="张三";
        $comid = input('comid');

        $zxid= input('zxid');
        $wher['ashop']=$comid;
        $whid['ashop']=$comid;
        $whid['id']=$zxid;
        $where['id'] = $comid;
        $pwhere['aid']=$zxid;
        $pwhere['tid']=null;
        $ztime=date("Y-m-d",strtotime("-1 day"));
        $mtime=date("Y-m-d",strtotime("+1 day"));
        $wtims['atime'] = array(array('EGT',$ztime),array('ELT',$mtime));
        $wtims['ashop']=$comid;
        $zhouk= date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y")));
        $zhoum= date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"))); 
        $zhwhere['atime']=array(array('EGT',$zhouk),array('ELT',$zhoum));
         $zhwhere['ashop']=$comid;
        $yuek=date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),1,date("Y")));
        $yuekm= date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("t"),date("Y")));
        $yuwhere['atime']=array(array('EGT',$yuek),array('ELT',$yuekm));
         $yuwhere['ashop']=$comid;
        $shopcom = $this->uri("shop",$where);
        $jin=db("article")->where($wtims)->limit('6')->select();//日
        $zhou=db("article")->where($zhwhere)->limit('6')->select();//周
        $yue=db("article")->where($yuwhere)->limit('6')->select();//月
        $article=db("article")->field("id,aname,ashop,abstract,pic,content,atime")->where($whid)->find();
        $tui=db("article")->field("id,aname,ashop,abstract,pic,content,atime")->where($wher)->limit('8')->select();//推荐
        $front=db('article')->where("id>".$zxid)->order('id asc')->limit('1')->find();//上一篇
        $after=db('article')->where("id<".$zxid)->order('id desc')->limit('1')->find();//下一篇
        $ping=db('arping')->where($pwhere)->select();
        $this->assign('after',$after);
        $this->assign('front',$front);
        $this->assign("shopcom",$shopcom);
        $this->assign("art",$article);
        $this->assign("shopcom",$shopcom);
        $this->assign("comid",$comid);
        $this->assign("jin",$jin);
        $this->assign("zhou",$zhou);
        $this->assign("yue",$yue);
        $this->assign("tui",$tui);
        $this->assign("name",$name);
        $this->assign("zxid",$zxid);
        $this->assign("ping",$ping);
         return $this->fetch();
    }
    public function ping()
    {
       $res = input();
        $user = db('arping'); 
       $res['time'] = date("Y-m-d h:i:s",time());
         $user_info = $user->insert($res);
         if($user_info)
         {
            $data='1';
         }
         else
         {
            $data='2';
         }
        return $data;
    }
    public function dianzan()
    {
        $dz=input();
        $dz['dzshu']=$dz['dzshu']+1;
        $where['id']=$dz['id'];
        $user = db('arping'); 
         $res = $user->where($where)->update($dz);
        return $dz['dzshu'];

    }
    public function hui()
    {
        $dz=input();
        $where['tid']=$dz['tid'];
        $user = db('arping'); 
         $res = $user->where($where)->select();
        return $dz['dzshu'];

    }
    
}
