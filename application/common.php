<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * *
 * @param  [type] 统一资源定位    [description]
 * @param  [type] $filter    [description]
 * @param  [type] $pag       [description]
 * @param  [type] $urlcanshu [description]
 * @return [type]            [description]
 */
     function uri($model, $filter,$pag=null,$urlcanshu=null)
    {
        if($pag){
            $info = db($model)->field("id,name,logo,dizhi,bl,rz,sum,dis,com_price,com_fuqy,com_leixing,com_szqy,com_zcfg,zixurenshu,com_jianjie,com_paixu,top,com_koubei,com_haoping,com_tel,(SELECT count(*) FROM plan WHERE plan.comid = shop.id) as fangancount,(SELECT count(*) FROM struction WHERE struction.comid = shop.id) as gongdicount,(SELECT count(*) FROM com_evaluate WHERE com_evaluate.comid = shop.id) as gspjcount")
            ->where($filter)->order("com_paixu desc")->paginate($pag,false,[
'query'=>$urlcanshu,
]);
        }else{
            if($filter && is_numeric($filter)){
                $filter  = array("id" => $filter);
            }else if($filter && is_array($filter)){
                $filter = $filter;
            }else{
               $info = db($model)->select();
            }
            $info = db($model)->where($filter)->select();
        }
        return $info;
    }
    /**
     * 将最小图片的路径添加到图册中
     * @return [type] [description]
     */
    function tucemixadd($tcid)
    {
        $wheretp['extatlas'] = $tcid;
        $mixid = db("ect_photo")->where($wheretp)->order('id')->select();
        if ($mixid) {
            $where['id'] = $mixid[0]['extatlas'];
            $shuju['logo'] = $mixid[0]['pimage'];
            db("ect_atlas")->where($where)->update($shuju);
        }else{
            return "数据有误";
        }
        return $mixid;
    }
    // 预约类型转换
    function yuyueleixing($code){
        $where['code'] = $code;
        $res = db('res_type')->where($where)->select();
        $name = $res[0]['name'];
        return $name;
    }
    // 案例风格转换
    function anlifenggename($code){
        $where['zcfgcode'] = $code;
        $res = db('com_zhuancfg')->where($where)->select();
        $name = $res[0]['zcfgname'];
        return $name;
    }
    // 日期转换 为年月日
    function timezhuanghuaduan($time){
        return date("Y-m-d",strtotime($time));
    }
    // 城市省转换
    function prodoname($code){
        $where['code'] = $code;
        $res = db('province')->where($where)->find();
        // dump($res);die;
        return $res['name'];
    }
    // 城市市转换
    function citydoname($code){
        $where['code'] = $code;
        $res = db('city')->where($where)->find();
        return $res['name'];
    }
    // 设计图总数
    function countshejitu($planid,$comid){
        $where['comid'] = $comid;
        $where['planid'] = $planid;
        $ct = db('plan_canting')->where($where)->count();//餐厅
        $cf = db('plan_chufang')->where($where)->count();//厨房
        $etj = db('plan_ertongjian')->where($where)->count();//儿童间
        $kt = db('plan_keting')->where($where)->count();//客厅
        $sf = db('plan_shufang')->where($where)->count();//书房
        $wsj = db('plan_weishengjian')->where($where)->count();//卫生间
        $ws = db('plan_wushi')->where($where)->count();//卧室
        $count = $ct + $cf +$etj + $kt + $sf +$wsj +$ws;
        // dump($count);
        return $count;
    }
    //后台阶段转换
    function jdhoutaizh($id){
        switch ($id) {
            case '1':
                  return "准备开工";
                break;
            case '2':
                return "水电阶段";
                break;
            case '3':
                  return "泥水阶段";
                break;
            case '4':
                 return "油漆阶段";
                break;
            case '5':
                  return "竣工阶段";
                break;
            default:
                  return "准备开工";
                break;
        }
    }
    //部门转换
    function bumengzhmc($code){
        $where['code'] = $code;
        $res = db('branch')->where($where)->select();
        if (empty($res)) {
            return '未分配';
        }else{
            return $res[0]['name'];
        }
    }
    //人员转换
    function renyuanzhuanhmc($code){
        $where['id'] = $code;
        $res = db('useradmin')->where($where)->select();
        if (empty($res)) {
            return '未分配';
        }else{
            return $res[0]['uname'];
        }
    }
    // 攻略类别转换
    function gongluetypename($code){
         switch ($code) {
            case '6':
                  return '<em>头条</em>';
                break;
            case '7':
                return '<em class="er">推荐</em>';
                break;
            case '8':
                  return "";
                break;
            default:
                  return "";
                break;
        }
    }
    // 攻略主类别
    function gongluezhuleibie($code){
        $where['id'] = $code;
        $res = db('str_zhulei')->where($where)->find();
        return $res['name'];
    }