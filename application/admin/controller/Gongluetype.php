<?php
/**
 * 后台公司类型控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年4月8日
*/
namespace app\admin\controller;

use think\Controller;

class Gongluetype extends  \app\admin\controller\Base
{
    /**
     * *类型
     * @return [type] [description]
     */
    public function zhulei()
    {
        // 链接数据库赋值
        $user = db('str_zhulei');
        //获取最大lxcode;
        // $lxcode = $user->code
      
        $res = $user->order("id")->paginate(10);
        $page=$res->render();
        $this->assign("page",$page);
        $this->assign("res",$res);
        // dump($res);die;
        return $this->view->fetch();
    }
    //执行添加
    public function zhuleiadd(){
        $user = db('str_zhulei');
       $file = request()->file('logo');
        $shuju = input('post.');//获取数据
        $shuju['time'] = date("Y-m-d h:i:s",time());    
        if($file){
        $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        }           
        $user_info = $user->insert($shuju);
        if (!$user_info) {
           $this->error("添加失败","admin/gonglue/zhulei");
        }else{
           $this->redirect("admin/gonglue/zhulei");
        }
        
    }
    //执行修改
    public function zhuleiedit(){
        $user = db('str_zhulei');
        $whid = input('post.lid');//获取id

        $where['id'] = $whid;
        $shuju['name'] = input('post.name');//获取数据
         $file = request()->file('shop_logo');
        if($file){
         $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        } 
      $res = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
        if (!$res) {
            $this->error("修改失败","admin/gonglue/zhulei");
        }
        else
        {
             $this->redirect("admin/gonglue/zhulei");
        }
    }
    //删除
    public function zhuleidel(){
        $user = db('str_zhulei');
        $whid = input('post.id');//获取id
        $res = $user->where('id',$whid)->delete();
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
     public function fuleibie()
    {
        // 链接数据库赋值
        $where['zlid'] = input('zlid');
        $zlid=input('zlid');
        $user = db('str_fuleibie');
        
      
        $res = $user->where($where)->order("id")->paginate(10);
        $page=$res->render();
        $this->assign("page",$page);
        $this->assign("res",$res);
        $this->assign("zlid",$zlid);
        // dump($res);die;
        return $this->view->fetch();
    }
    //执行添加
    public function fuleibieadd(){
        $user = db('str_fuleibie');
      
        $shuju = input('post.');//获取数据
        $shuju['time'] = date("Y-m-d h:i:s",time());    
                 
        $user_info = $user->insert($shuju);
        if (!$user_info) {
           $this->error("添加失败","admin/gonglue/fuleibie",['zlid'=>$shuju['zlid']]);
        }else{
           $this->redirect("admin/gonglue/fuleibie",['zlid'=>$shuju['zlid']]);
        }
        
    }
    //执行修改
    public function fuleibieedit(){
        $user = db('str_fuleibie');
        $whid = input('post.lid');//获取id
         
        $where['id'] = $whid;
        $shuju['name'] = input('post.name');//获取数据
        
        
      $res = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
        if (!$res) {
            $this->error("修改失败","admin/gonglue/fuleibie",['zlid'=>$shuju['zlid']]);
        }
        else
        {
             $this->redirect("admin/gonglue/fuleibie",['zlid'=>$shuju['zlid']]);
        }
    }
    //删除
    public function fuleibiedel(){
        $user = db('str_fuleibie');
        $whid = input('post.id');//获取id
        $res = $user->where('id',$whid)->delete();
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
}