<?php
/**
 * 后台公司类型控制器 LoginController.class.php
 * ============================================================================
 * 许可声明：这是一个开源程序，未经许可不得将本软件的整体或任何部分用于商业用途及再发布。
 * ============================================================================
 * Author: yangxuya
 * Date: 2018年4月8日
*/
namespace app\adminshop\controller;

use think\Controller;
use think\Request;
use think\File;
use think\Session;

class Article extends Controller
{
    /**
     * *类型
     * @return [type] [description]
     */
    public function index()
    {
      	$user=db('article');
      	$where=array ();
    		$comid= Session::get('adminshopid');
    		$where['ashop']=$comid;
  		  $request = Request::instance();
        $urlcanshu = $request->param();
        $aname='';
        if (!empty($urlcanshu['keyword'])) {
             $where['aname']=array('like','%'.$urlcanshu['keyword'].'%');
             $aname=$urlcanshu['keyword'];
        }
      	$res=$user->field("article.id,aname,ashop,abstract,pic,content,ischeck,istop,name,atime")->join('shop s','article.ashop = s.id')->where($where)->order("article.id")->paginate(10,false,['query'=>$urlcanshu,]);
      	$page=$res->render();
      	$this->assign("comid",$comid);
      	$this->assign("page",$page);
      	$this->assign("res",$res);
  		return $this->view->fetch();
    }
     public function add()
    {
         $user = db('article'); 
        $file = request()->file('pic');
        $shuju = input('post.');//获取数据
        $shuju['atime'] = date("Y-m-d h:i:s",time());
        $shuju['ischeck']=2; 
        $shuju['istop']=2;
         if($file)
       { 
        $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
        if($info){
             $shuju['pic']=$info->getSaveName();
        }  
        }      
        $user_info = $user->insert($shuju);
        if (!$user_info) {
           $this->error("adminshop/Article/index");
        }
        else
        {
          $this->redirect("adminshop/Article/index");
        }
      
    }
     //执行修改
    public function edit(){
        $user = db('article');
        $whid = input('post.id');//获取id
        $where['id'] = $whid; 
        $shuju = input('post.');//获取数据
        $file = request()->file('pic');
      if($file)
       { 
         $info = $file->move(ROOT_PATH . 'public/static/' . DS . 'uploads');    
        if($info){
             $shuju['pic']=$info->getSaveName();
        }
        } 
        $res = $user->where($where)->update($shuju);
        if (!$res) {
           $this->error("修改失败","adminshop/Article/index");
        }
        else
        {
          $this->redirect("adminshop/Article/index");
        }
        
    }
    //
    public function delete($id){
        $user = db('article');
        $whid = input('post.id');//获取id
          $file = input('post.pic'); 
          if($file){
             $result = @unlink ($file);
          }
        
  
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