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
use think\Request;
use think\File;
class Gled extends  \app\admin\controller\Base
{
    /**
     * *类型
     * @return [type] [description]
     */
    public function index()
    { 
        $strid=input('strid');
        $where['strid']=$strid;
        $com['id']=$strid;
         $com['name'] = uri('str_strate',array('id'=>$com['id']))[0]['title'];
        // 链接数据库赋值
        $user = db('str_detail');
         $request = Request::instance();
        $urlcanshu = $request->param();
       
        $res = $user->where($where)->paginate(10,false,['query'=>$urlcanshu,]);
        $page=$res->render();
        $this->assign("page",$page);
        $this->assign("res",$res);
        $this->assign("com",$com);
        // dump($res);die;
        return $this->view->fetch();
    }
    //执行添加
    public function add(){
        $user = db('str_detail');
       $file = request()->file('logo');
        $shuju = input('post.');//获取数据
        $shuju['time'] = date("Y-m-d h:i:s",time());    
        if($file){
        $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        }           
        $user_info = $user->insert($shuju);
        if (!$user_info) {
           $this->error("添加失败","admin/gled/index",['strid'=>$shuju['strid']]);
        }else{
           $this->redirect("admin/gled/index",['strid'=>$shuju['strid']]);
        }
        
    }
    //执行修改
    public function edit(){
        $user = db('str_detail');
        $whid = input('post.id');//获取id

        $where['id'] = $whid;
        $shuju = input('post.');//获取数据
         $file = request()->file('shop_logo');
        if($file){
         $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        } 
      $user_info = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
        if (!$user_info) {
           $this->error("添加失败","admin/gled/index",['strid'=>$shuju['strid']]);
        }else{
           $this->redirect("admin/gled/index",['strid'=>$shuju['strid']]);
        }
    }
    //删除
    public function delete(){
        $user = db('str_detail');
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