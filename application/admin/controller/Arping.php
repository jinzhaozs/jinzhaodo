<?php
/**
 * 后台公司点评控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年5月7日
*/
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\File;

class Arping extends  \app\admin\controller\Base
{
    /**
     * *类型
     * @return [type] [description]
     */
    public function index()
    {
         //获取参数
       
        $ar['id'] = input('arid');
        $where['aid']=$ar['id'];
        $plan['id']=$ar['id'];
        $where['tid']=null;
        // 转换名称
        $plan['name'] = uri('article',array('id'=>$ar['id']))[0]['aname'];
        $user = db('arping');
        $request = Request::instance();
        $urlcanshu = $request->param();
        $res = $user->where($where)->paginate(10,false,['query'=>$urlcanshu,]);
        $page=$res->render();
        $this->assign("page",$page);
       
        $this->assign("plan",$plan);//文章
        $this->assign("res",$res);
        // dump($res);die;
        return $this->view->fetch();
    }
     public function add()
    {
        $user = db('arping'); 
        
        $shuju = input('post.');//获取数据   
       

        $user_info = $user->insert($shuju);//主表添加 
        if (!$user_info) {
           $this->error("添加失败","admin/arping/index",['arid'=>$shuju['aid']]);
        }else{
           $this->redirect("admin/arping/index",['arid'=>$shuju['aid']]);
        }
    }
     //执行修改
    public function edit(){
        $user = db('arping');
        $where['id'] = input('post.id');//获取id
          
        $shuju = input('post.');//获取数据
        // dump($shuju);
       
        $res = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
      if (!$res) {
           $this->error("修改失败","admin/arping/index",['arid'=>$shuju['aid']]);
        }else{
           $this->redirect("admin/arping/index",['arid'=>$shuju['aid']]);
        }
        
    }
    //
    public function del(){
          $user = db('arping');
        $where['id'] = input('post.sfid');//获取id
        // return $where['id'];
        $res = $user->where($where)->delete();
        if (!$res) {
            $data = array(
                    'data' => false,
                    'code' => 500,
                    'msg'  => '删除失败',
            );

            return $data;
        }
        $data = array(
                'data' => true,
                'code' => 200,
                'msg'  => '删除成功 !',
        );
        return $data;
    }
    public function hui()
    {
         //获取参数
         $ar['aid']=input('aid');

        $ar['id'] = input('arid'); 
        $where['tid']=$ar['id'];
        $where['aid']=$ar['aid'];
        $plan['id']=$ar['id'];
        $ping['id']= $ar['aid'];
        // 转换名称
        $plan['name'] = uri('article',array('id'=>$ar['aid']))[0]['aname'];
        $ping['name'] = uri('arping',array('id'=>$ar['id']))[0]['arname'];
        $user = db('arping');
        $request = Request::instance();
        $urlcanshu = $request->param();
        $res = $user->where($where)->paginate(10,false,['query'=>$urlcanshu,]);
        $page=$res->render();
        $this->assign("page",$page);
       $this->assign("ping",$ping);
        $this->assign("plan",$plan);//文章
        $this->assign("res",$res);
        // dump($res);die;
        return $this->view->fetch();
    }
     public function huiadd()
    {
        $user = db('arping'); 
        
        $shuju = input('post.');//获取数据   
       

        $user_info = $user->insert($shuju);//主表添加 
        if (!$user_info) {
           $this->error("添加失败","admin/arping/huiindex",['arid'=>$shuju['tid'],'aid'=>$shuju['aid']]);
        }else{
           $this->redirect("admin/arping/huiindex",['arid'=>$shuju['tid'],'arid'=>$shuju['aid']]);
        }
    }
     public function huiedit(){
        $user = db('arping');
        $where['id'] = input('post.id');//获取id
          
        $shuju = input('post.');//获取数据
        // dump($shuju);
       
        $res = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
      if (!$res) {
           $this->error("修改失败","admin/arping/hui",['arid'=>$shuju['tid'],'aid'=>$shuju['aid']]);
        }else{
           $this->redirect("admin/arping/hui",['arid'=>$shuju['tid'],'aid'=>$shuju['aid']]);
        }
        
    }
    

}