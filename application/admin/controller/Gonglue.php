<?php
/**
 * 后台公司类型控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年4月13日
*/
namespace app\admin\controller;

use think\Controller;

use think\Request;

use think\File;

class Gonglue extends \app\admin\controller\Base
{
    /**
     * 攻略
     * @return [type] [description]
     */
    public function index()
    {
        //攻略类别
        $userlb = db("str_zhulei");
        $reslb = $userlb->select();
        // 攻略信息
        $user = db('str_strate');
         //分页
        $res = $user->field('id,ztyid,ftyid,title,laiyuan,liulannum,daodu,text,logo,date(time_fb) as time_fb,type')
         ->paginate(6); 
        // dump($res);die;
        $page=$res->render();
        $this->assign("res",$res);//攻略
        $this->assign("reslb",$reslb);//攻略类别
        $this->assign("page",$page);
        return $this->view->fetch();
    }
    //攻略子类别
    public function zileibie(){
        $provinceid = input("post.provinceid");
        $where['zlid'] = $provinceid;
        $res = db("str_fuleibie")->where($where)->select();
        return $res;
    }
    public function add()
    {
        // 主表添加
        $user = db('str_strate'); 
        $file = request()->file('logo');
        $shuju = input('post.');//获取数据
        $shuju['time_mr'] = date("Y-m-d h:i:s",time());
        $shuju['type'] =8;   
        if($file){
        $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        }           
        $user_info = $user->insert($shuju);//主表添加 
        if (!$user_info) {
           $this->error("添加失败","admin/gonglue/index");
        }else{
           $this->redirect("admin/gonglue/index");
        }
        
    }
    //执行修改
    public function edit(){
        $user = db('str_strate');
        $where['id'] = input('post.id');//获取id
          
        $shuju = input('post.');//获取数据
        $shuju['time_mr'] = date("Y-m-d h:i:s",time());
        // dump($shuju);
        $file = request()->file('logo');
        if($file){
         $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
             $shuju['logo']=$info->getSaveName();
        } 
        $user_info = $user->where($where)->update($shuju);
        // echo $user->getLastsql();die;
       if (!$user_info) {
           $this->error("添加失败","admin/gonglue/index");
        }else{
           $this->redirect("admin/gonglue/index");
        }
        
    }
    //
    public function del(){
        $user = db('str_strate');
        $where['id'] = input('post.lbtid');//获取id
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
}
