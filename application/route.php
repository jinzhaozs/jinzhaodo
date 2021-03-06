<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
/**
 * 前台主页
 */
// 注册路由到index模块的News控制器的read操作
Route::rule('/','index/Index/index');//查询
Route::rule('/zxgs','index/Index/index');//查询
Route::rule('/aa','index/Index/aa');//查询
Route::rule('/regis','index/Index/regis');//注册页面
Route::rule('/index/Index/doregis','index/Index/doregis');//执行注册
/**
 * 图册
 */
Route::rule('/tucei','index/Tucei/index');//图册
Route::rule('/tu','index/Tu/index');//图册-图片
Route::rule('/tcei','index/Tcei/index');//图册-图册
Route::rule('/tceixq','index/Tuceixq/index');//图册-详情
/**
 * 前台装修公司
 */
Route::rule('/shopqt','index/Index/shopqt');//查询
/**
 * 前台攻略
 */
Route::rule('/strate','index/Gonglue/index');//攻略首页
Route::rule('/stratetype','index/Gonglue/stratetype');//攻略类别页
Route::rule('/strateneirong','index/Gonglue/strateneirong');//攻略内容

/**
 * 前台公司
 */
Route::rule('/shopcom','shopcom/Index/index');//首页
Route::rule('/scjianjie','shopcom/Jianjie/index');//简介
Route::rule('/scjian/zheng','shopcom/Jianjie/zheng');//简介证书
Route::rule('/scjian/xin','shopcom/Jianjie/xin');//简介信息
Route::rule('/scjian/lian','shopcom/Jianjie/lian');//简介联系我们
Route::rule('/scjian/xing','shopcom/Jianjie/xing');//简介服务
Route::rule('/scjian/article','shopcom/Jianjie/article');//简介文章
Route::rule('/scanli','shopcom/Anli/index');//案例
Route::rule('/scanlide/detail','shopcom/Anli/detail');//案例详情
Route::rule('/scgongdi','shopcom/Gongdi/index');//工地
Route::rule('/scshejishi','shopcom/Shejishi/index');//设计师
Route::rule('/shejianjie','shopcom/Shejishi/xiangqing');//设计师
Route::rule('/scdianping','shopcom/Dianping/index');//点评
Route::rule('/schuodong','shopcom/Huodong/index');//活动
Route::rule('/huodong','shopcom/Huodong/xiangqing');//活动详情
Route::rule('/sczixun','shopcom/Zixun/index');//资讯
Route::rule('/zixun','shopcom/Zixun/xiangqing');//资讯
Route::rule('/zixun/ping','shopcom/Zixun/ping');//资讯
Route::rule('/zixun/hui','shopcom/Zixun/hui');//资讯
Route::rule('/zixun/dianzan','shopcom/Zixun/dianzan');//咨询点赞
Route::rule('/sclxwm','shopcom/Lianxiwm/index');//联系我们
// 提交预约信息
Route::rule('/shopcomyy/Anli/addyuyuexx','shopcom/Anli/addyuyuexx');
/**
 * 后台
 */
// 攻略
Route::rule('/admin/gonglue/index','admin/Gonglue/index');//攻略列表
Route::rule('/admin/gonglue/add','admin/Gonglue/add');
Route::rule('/admin/gonglue/edit','admin/Gonglue/edit');
Route::rule('/admin/gonglue/del','admin/Gonglue/del');
Route::rule('/admin/Gonglue/zileibie','admin/Gonglue/zileibie');//攻略子类别
//攻略内容-副标
Route::rule('/admin/gled/index','admin/gled/index');//攻略内容-副标详情
Route::rule('/admin/gled/add','admin/gled/add');//添加
Route::rule('/admin/gled/edit','admin/gled/edit');//修改
Route::rule('/admin/gled/delete','admin/gled/delete');//删除

// 登陆
Route::rule('/admin/login/index','admin/login/index');//后台登陆页面
Route::rule('/admin/login/dologin','admin/login/dologin');//后台执行登陆
Route::rule('/admin/login/dosign','admin/login/dosign');//后台执行退出
Route::rule('/admin/index/index','admin/index/index');//主页
//预约列表
Route::rule('/admin/reserva/index','admin/reserva/index');
Route::rule('/admin/reserva/edit','admin/reserva/edit');//修改
Route::rule('/admin/Reserva/ajaxbumendory','admin/Reserva/ajaxbumendory');//部门——》人员
Route::rule('/admin/reserva/editfenpei','admin/reserva/editfenpei');//执行分配单一
Route::rule('/admin/Reserva/addplfp','admin/Reserva/addplfp');//执行分配批量
// 服务类型
Route::rule('/admin/gongsi/fwleixing','admin/gongsi/fwleixing');//类型
Route::rule('/admin/gongsi/doadd','admin/gongsi/doadd');//类型 添加
Route::rule('/admin/gongsi/doedit','admin/gongsi/doedit');//类型 修改
Route::rule('/admin/gongsi/del','admin/gongsi/del');//类型 删除

// 服务区域
Route::rule('/admin/gongsi/fuwuqu','admin/gongsi/fuwuqu');//服务区域
Route::rule('/admin/gongsi/qyadd','admin/gongsi/fuwuquadd');// 添加
Route::rule('/admin/gongsi/qyedit','admin/gongsi/fuwuquedit');// 修改
Route::rule('/admin/gongsi/qydel','admin/gongsi/fuwuqudel');// 删除

// 所在区域
Route::rule('/admin/gongsi/suozaiqu','admin/gongsi/suozaiqu');//所在区域
Route::rule('/admin/gongsi/suozaiquadd','admin/gongsi/suozaiquadd');// 添加
Route::rule('/admin/gongsi/suozaiquedit','admin/gongsi/suozaiquedit');// 修改
Route::rule('/admin/gongsi/suozaiqudel','admin/gongsi/suozaiqudel');// 删除

// 服务风格
Route::rule('/admin/gongsi/zhuancfg','admin/gongsi/zhuancfg');//服务风格
Route::rule('/admin/gongsi/zhuancfgadd','admin/gongsi/zhuancfgadd');// 添加
Route::rule('/admin/gongsi/zhuancfgedit','admin/gongsi/zhuancfgedit');// 修改
Route::rule('/admin/gongsi/zhuancfgdel','admin/gongsi/zhuancfgdel');// 删除

// 服务价位
Route::rule('/admin/gongsi/price','admin/gongsi/price');//服务价位
Route::rule('/admin/gongsi/priceadd','admin/gongsi/priceadd');// 添加
Route::rule('/admin/gongsi/priceedit','admin/gongsi/priceedit');// 修改
Route::rule('/admin/gongsi/pricedel','admin/gongsi/pricedel');// 删除

//户型
Route::rule('/admin/gongsi/layout','admin/gongsi/layout');//户型风格
Route::rule('/admin/gongsi/layoutadd','admin/gongsi/layoutadd');// 添加
Route::rule('/admin/gongsi/layoutedit','admin/gongsi/layoutedit');// 修改
Route::rule('/admin/gongsi/layoutdel','admin/gongsi/layoutdel');// 删除

//预约状态
Route::rule('/admin/gongsi/resevatype','admin/gongsi/resevatype');//预约状态
Route::rule('/admin/gongsi/resevatypeadd','admin/gongsi/resevatypeadd');// 添加
Route::rule('/admin/gongsi/resevatypeedit','admin/gongsi/resevatypeedit');// 修改
Route::rule('/admin/gongsi/resevatypedel','admin/gongsi/resevatypedel');// 删除
//攻略类型-主
Route::rule('/admin/gongluetype/zhulei','admin/gongluetype/zhulei');//攻略主类型
Route::rule('/admin/gongluetype/zhuleiadd','admin/gongluetype/zhuleiadd');// 添加
Route::rule('/admin/gongluetype/zhuleiedit','admin/gongluetype/zhuleiedit');// 修改
Route::rule('/admin/gongluetype/zhuleidel','admin/gongluetype/zhuleidel');// 删除

//攻略类型-副
Route::rule('/admin/gongluetype/fuleibie','admin/gongluetype/fuleibie');//攻略子类型
Route::rule('/admin/gongluetype/fuleibiedd','admin/gongluetype/fuleibieadd');// 添加
Route::rule('/admin/gongluetype/fuleibieedit','admin/gongluetype/fuleibieedit');// 修改
Route::rule('/admin/gongluetype/fuleibiedel','admin/gongluetype/fuleibiedel');// 删除
//公司
Route::rule('/admin/shop/index','admin/shop/index');//公司详情
Route::rule('/admin/shop/add','admin/shop/add');//添加
Route::rule('/admin/shop/edit','admin/shop/edit');//修改
Route::rule('/admin/shop/delete','admin/shop/delete');//删除
Route::rule('/admin/shop/ajaxedit','admin/shop/ajaxedit');//置顶
Route::rule('/admin/shop/ajaxqzhi','admin/shop/ajaxqzhi');//取消置顶
Route::rule('/admin/Shop/ajaxcode','admin/Shop/ajaxcode');//验证账号是否唯一
//公司案例
Route::rule('/admin/plan/index','admin/plan/index');//公司 案例列表
Route::rule('/admin/plan/add','admin/plan/add');//添加
Route::rule('/admin/plan/ajaxedit','admin/plan/ajaxedit');//修改参数
Route::rule('/admin/plan/ajaxtpguanli','admin/plan/ajaxtpguanli');//图片管理
Route::rule('/admin/plan/edit','admin/plan/edit');//修改
Route::rule('/admin/Plan/tupianguanli','admin/Plan/tupianguanli');//图片管理修改
Route::rule('/admin/plan/delete','admin/plan/delete');//删除

//案例图片管理
//书房
Route::rule('/admin/plantu/shufangindex','admin/plantu/shufangindex');//图片管理书房
Route::rule('/admin/Plantu/shufangadd','admin/Plantu/shufangadd');//图片管理书房添加
Route::rule('/admin/Plantu/shufangedit','admin/Plantu/shufangedit');//图片管理书房修改
Route::rule('/admin/Plantu/shufangdel','admin/Plantu/shufangdel');//图片管理书房del
//施工图
Route::rule('/admin/plantu/shigongindex','admin/plantu/shigongindex');//图片管理施工图
Route::rule('/admin/Plantu/shigongadd','admin/Plantu/shigongadd');//图片管理施工图添加
Route::rule('/admin/Plantu/shigongedit','admin/Plantu/shigongedit');//图片管理施工图修改
Route::rule('/admin/Plantu/shigongdel','admin/Plantu/shigongdel');//图片管理施工图del
//餐厅
Route::rule('/admin/plantu/cantingindex','admin/plantu/cantingindex');//图片管理餐厅
Route::rule('/admin/Plantu/cantingadd','admin/Plantu/cantingadd');//图片管理餐厅添加
Route::rule('/admin/Plantu/cantingedit','admin/Plantu/cantingedit');//图片管理餐厅修改
Route::rule('/admin/Plantu/cantingdel','admin/Plantu/cantingdel');//图片管理餐厅del
//厨房
Route::rule('/admin/plantu/chufangindex','admin/plantu/chufangindex');//图片管理厨房
Route::rule('/admin/Plantu/chufangadd','admin/Plantu/chufangadd');//图片管理厨房添加
Route::rule('/admin/Plantu/chufangedit','admin/Plantu/chufangedit');//图片管理厨房修改
Route::rule('/admin/Plantu/chufangdel','admin/Plantu/chufangdel');//图片管理厨房del

//卧室
Route::rule('/admin/plantu/woshiindex','admin/plantu/woshiindex');
Route::rule('/admin/Plantu/woshiadd','admin/Plantu/woshiadd');
Route::rule('/admin/Plantu/woshiedit','admin/Plantu/woshiedit');
Route::rule('/admin/Plantu/woshidel','admin/Plantu/woshidel');
//儿童间
Route::rule('/admin/plantu/ertongjianindex','admin/plantu/ertongjianindex');
Route::rule('/admin/Plantu/ertongjianadd','admin/Plantu/ertongjianadd');
Route::rule('/admin/Plantu/ertongjianedit','admin/Plantu/ertongjianedit');
Route::rule('/admin/Plantu/ertongjiandel','admin/Plantu/ertongjiandel');
//卫生间
Route::rule('/admin/plantu/weishengjianindex','admin/plantu/weishengjianindex');
Route::rule('/admin/Plantu/weishengjianadd','admin/Plantu/weishengjianadd');
Route::rule('/admin/Plantu/weishengjianedit','admin/Plantu/weishengjianedit');
Route::rule('/admin/Plantu/weishengjiandel','admin/Plantu/weishengjiandel');
//客厅
Route::rule('/admin/plantu/ketingindex','admin/plantu/ketingindex');
Route::rule('/admin/Plantu/ketingadd','admin/Plantu/ketingadd');
Route::rule('/admin/Plantu/ketingedit','admin/Plantu/ketingedit');
Route::rule('/admin/Plantu/ketingdel','admin/Plantu/ketingdel');


//公司工地
Route::rule('/admin/plangong/index','admin/plangong/index');//公司 案例列表
Route::rule('/admin/plangong/add','admin/plangong/add');//添加
Route::rule('/admin/plangong/ajaxedit','admin/plangong/ajaxedit');//修改参数
Route::rule('/admin/plangong/ajaxtpguanli','admin/plangong/ajaxtpguanli');//图片管理
Route::rule('/admin/plangong/edit','admin/plangong/edit');//修改
Route::rule('/admin/plangong/tupianguanli','admin/plangong/tupianguanli');//图片管理修改
Route::rule('/admin/plangong/delete','admin/plangong/delete');//删除
// 公司轮播图管理
Route::rule('/admin/Shoplbt/index','admin/Shoplbt/index');//服务价位
Route::rule('/admin/Shoplbt/add','admin/Shoplbt/add');// 添加
Route::rule('/admin/Shoplbt/edit','admin/Shoplbt/edit');// 修改
Route::rule('/admin/Shoplbt/del','admin/Shoplbt/del');// 删除
// 公司业务点评管理
Route::rule('/admin/Shopeval/index','admin/Shopeval/index');//服务价位
Route::rule('/admin/Shopeval/add','admin/Shopeval/add');// 添加
Route::rule('/admin/Shopeval/edit','admin/Shopeval/edit');// 修改
Route::rule('/admin/Shopeval/del','admin/Shopeval/del');// 删除

//公司设计师
Route::rule('/admin/designer/index','admin/designer/index');//公司详情
Route::rule('/admin/designer/add','admin/designer/add');//添加
Route::rule('/admin/designer/edit','admin/designer/edit');//修改
Route::rule('/admin/designer/delete','admin/designer/delete');//删除

//文章
Route::rule('/admin/article/index','admin/article/index');//公司 文章列表
Route::rule('/admin/article/add','admin/article/add');//添加
Route::rule('/admin/article/edit','admin/article/edit');//修改
Route::rule('/admin/article/delete','admin/article/delete');//删除
//效果图
//效果图--图册列表
Route::rule('/admin/ectatlas/index','admin/ectatlas/index');//户型风格
Route::rule('/admin/ectatlas/add','admin/ectatlas/add');// 添加
Route::rule('/admin/ectatlas/edit','admin/ectatlas/edit');// 修改
Route::rule('/admin/ectatlas/del','admin/ectatlas/del');// 删除
//效果图--空间
Route::rule('/admin/ectkj/index','admin/ectkj/index');//户型风格
Route::rule('/admin/ectkj/add','admin/ectkj/add');// 添加
Route::rule('/admin/ectkj/edit','admin/ectkj/edit');// 修改
Route::rule('/admin/ectkj/del','admin/ectkj/del');// 删除

//图册-面积
Route::rule('/admin/tuce/mianji','admin/tuce/mianji');//公司 文章列表
Route::rule('/admin/tuce/mianjiadd','admin/tuce/mianjiadd');//添加
Route::rule('/admin/tuce/mianjiedit','admin/tuce/mianjiedit');//修改
Route::rule('/admin/tuce/mianjidel','admin/tuce/mianjidel');//删除

//图册-局部
Route::rule('/admin/tuce/jubu','admin/tuce/jubu');//公司 文章列表
Route::rule('/admin/tuce/jubuadd','admin/tuce/jubuadd');//添加
Route::rule('/admin/tuce/jubuedit','admin/tuce/jubuedit');//修改
Route::rule('/admin/tuce/jubudel','admin/tuce/jubudel');//删除

//图册-热门标签
Route::rule('/admin/tuce/remen','admin/tuce/remen');//公司 文章列表
Route::rule('/admin/tuce/remenadd','admin/tuce/remenadd');//添加
Route::rule('/admin/tuce/remenedit','admin/tuce/remenedit');//修改
Route::rule('/admin/tuce/remendel','admin/tuce/remendel');//删除

//效果图--图片列表
Route::rule('/admin/photo/index','admin/photo/index');//户型风格
Route::rule('/admin/photo/add','admin/photo/add');// 添加
Route::rule('/admin/photo/edit','admin/photo/edit');// 修改
Route::rule('/admin/photo/del','admin/photo/del');// 删除
//人员
Route::rule('/admin/user/index','admin/user/index');//员工详情
Route::rule('/admin/user/add','admin/user/add');//添加
Route::rule('/admin/user/edit','admin/user/edit');//修改
Route::rule('/admin/user/delete','admin/user/delete');//删除
Route::rule('/admin/user/ajaxcode','admin/user/ajaxcode');//账号验证
Route::rule('/admin/user/xg','admin/user/xg');//修改密码
Route::rule('/admin/user/ajaxyuan','admin/user/ajaxyuan');//判断原密码
//员工
Route::rule('/admin/ruser/index','admin/ruser/index');//员工详情
Route::rule('/admin/ruser/add','admin/ruser/add');//添加
Route::rule('/admin/ruser/edit','admin/ruser/edit');//修改
Route::rule('/admin/ruser/delete','admin/ruser/delete');//删除
Route::rule('/admin/ruser/ajaxcode','admin/ruser/ajaxcode');//账号验证
Route::rule('/admin/ruser/xg','admin/ruser/xg');//修改密码
Route::rule('/admin/ruser/ajaxyuan','admin/ruser/ajaxyuan');//判断原密码
//部门
Route::rule('/admin/bm/index','admin/bm/index');//部门
Route::rule('/admin/bm/add','admin/bm/add');// 添加
Route::rule('/admin/bm/edit','admin/bm/edit');// 修改
Route::rule('/admin/bm/del','admin/bm/del');// 删除
//总设计师
Route::rule('/admin/zdesigner/index','admin/zdesigner/index');
//优惠活动
Route::rule('/admin/act/index','admin/act/index');//优惠活动
Route::rule('/admin/act/add','admin/act/add');// 添加
Route::rule('/admin/act/edit','admin/act/edit');// 修改
Route::rule('/admin/act/del','admin/act/del');// 删除
/**
 * 公司后台
 */
// 登陆页面
Route::rule('/adminshop','adminshop/login/index');

//执行登陆
Route::rule('/adminshop/login/dologin','adminshop/login/dologin');//执行登陆
Route::rule('/adminshop/login/dosign','adminshop/login/dosign');//执行退出
// 主页
Route::rule('/adminshop/index/index','adminshop/index/index');
//基本信息
Route::rule('/adminshop/index/jibenxinxi','adminshop/index/jibenxinxi');
// 修改基本信息
Route::rule('/adminshop/index/editjbxx','adminshop/index/editjbxx');
//详细信息
Route::rule('/adminshop/index/xiangxixinxi','adminshop/index/xiangxixinxi');
// 修改详细信息
Route::rule('/adminshop/index/editxiangxixx','adminshop/index/editxiangxixx');
//公司案例
Route::rule('/adminshop/plan/index','adminshop/plan/index');//公司 案例列表
Route::rule('/adminshop/plan/add','adminshop/plan/add');//添加
Route::rule('/adminshop/plan/ajaxedit','adminshop/plan/ajaxedit');//修改参数
Route::rule('/adminshop/plan/ajaxtpguanli','adminshop/plan/ajaxtpguanli');//图片管理
Route::rule('/adminshop/plan/edit','adminshop/plan/edit');//修改
Route::rule('/adminshop/Plan/tupianguanli','adminshop/Plan/tupianguanli');//图片管理修改
Route::rule('/adminshop/plan/delete','adminshop/plan/delete');//删除
//案例图片管理
//书房
Route::rule('/adminshops/plantu/shufangindex','adminshop/plantu/shufangindex');//图片管理书房
Route::rule('/adminshops/Plantu/shufangadd','adminshop/Plantu/shufangadd');//图片管理书房添加
Route::rule('/adminshops/Plantu/shufangedit','adminshop/Plantu/shufangedit');//图片管理书房修改
Route::rule('/adminshops/Plantu/shufangdel','adminshop/Plantu/shufangdel');//图片管理书房del
//施工图
Route::rule('/adminshops/plantu/shigongindex','adminshop/plantu/shigongindex');//图片管理施工图
Route::rule('/adminshops/Plantu/shigongadd','adminshop/Plantu/shigongadd');//图片管理施工图添加
Route::rule('/adminshops/Plantu/shigongedit','adminshop/Plantu/shigongedit');//图片管理施工图修改
Route::rule('/adminshops/Plantu/shigongdel','adminshop/Plantu/shigongdel');//图片管理施工图del
//餐厅
Route::rule('/adminshops/plantu/cantingindex','adminshop/plantu/cantingindex');//图片管理餐厅
Route::rule('/adminshops/Plantu/cantingadd','adminshop/Plantu/cantingadd');//图片管理餐厅添加
Route::rule('/adminshops/Plantu/cantingedit','adminshop/Plantu/cantingedit');//图片管理餐厅修改
Route::rule('/adminshops/Plantu/cantingdel','adminshop/Plantu/cantingdel');//图片管理餐厅del
//厨房
Route::rule('/adminshops/plantu/chufangindex','adminshop/plantu/chufangindex');//图片管理厨房
Route::rule('/adminshops/Plantu/chufangadd','adminshop/Plantu/chufangadd');//图片管理厨房添加
Route::rule('/adminshops/Plantu/chufangedit','adminshop/Plantu/chufangedit');//图片管理厨房修改
Route::rule('/adminshops/Plantu/chufangdel','adminshop/Plantu/chufangdel');//图片管理厨房del

//卧室
Route::rule('/adminshops/plantu/woshiindex','adminshop/plantu/woshiindex');
Route::rule('/adminshops/Plantu/woshiadd','adminshop/Plantu/woshiadd');
Route::rule('/adminshops/Plantu/woshiedit','adminshop/Plantu/woshiedit');
Route::rule('/adminshops/Plantu/woshidel','adminshop/Plantu/woshidel');
//儿童间
Route::rule('/adminshops/plantu/ertongjianindex','adminshop/plantu/ertongjianindex');
Route::rule('/adminshops/Plantu/ertongjianadd','adminshop/Plantu/ertongjianadd');
Route::rule('/adminshops/Plantu/ertongjianedit','adminshop/Plantu/ertongjianedit');
Route::rule('/adminshops/Plantu/ertongjiandel','adminshop/Plantu/ertongjiandel');
//卫生间
Route::rule('/adminshops/plantu/weishengjianindex','adminshop/plantu/weishengjianindex');
Route::rule('/adminshops/Plantu/weishengjianadd','adminshop/Plantu/weishengjianadd');
Route::rule('/adminshops/Plantu/weishengjianedit','adminshop/Plantu/weishengjianedit');
Route::rule('/adminshops/Plantu/weishengjiandel','adminshop/Plantu/weishengjiandel');
//客厅
Route::rule('/adminshops/plantu/ketingindex','adminshop/plantu/ketingindex');
Route::rule('/adminshops/Plantu/ketingadd','adminshop/Plantu/ketingadd');
Route::rule('/adminshops/Plantu/ketingedit','adminshop/Plantu/ketingedit');
Route::rule('/adminshops/Plantu/ketingdel','adminshop/Plantu/ketingdel');

//公司工地
Route::rule('/adminshop/plangong/index','adminshop/plangong/index');//公司 案例列表
Route::rule('/adminshop/plangong/add','adminshop/plangong/add');//添加
Route::rule('/adminshop/plangong/ajaxedit','adminshop/plangong/ajaxedit');//修改参数
Route::rule('/adminshop/plangong/ajaxtpguanli','adminshop/plangong/ajaxtpguanli');//图片管理
Route::rule('/adminshop/plangong/edit','adminshop/plangong/edit');//修改
Route::rule('/adminshop/plangong/tupianguanli','adminshop/plangong/tupianguanli');//图片管理修改
Route::rule('/adminshop/plangong/delete','adminshop/plangong/delete');//删除
//公司设计师
Route::rule('/adminshop/designer/index','adminshop/designer/index');//公司 设计师列表
Route::rule('/adminshop/designer/add','adminshop/designer/add');//添加
Route::rule('/adminshop/designer/edit','adminshop/designer/edit');//修改
Route::rule('/adminshop/designer/delete','adminshop/designer/delete');//删除
// 公司业务点评管理
Route::rule('/adminshopd/Shopeval/index','adminshop/Shopeval/index');//服务价位
Route::rule('/adminshopd/Shopeval/add','adminshop/Shopeval/add');// 添加
Route::rule('/adminshopd/Shopeval/edit','adminshop/Shopeval/edit');// 修改
Route::rule('/adminshopd/Shopeval/del','adminshop/Shopeval/del');// 删除
// 公司轮播图管理
Route::rule('/adminshop/Shoplbt/index','adminshop/Shoplbt/index');//服务价位
Route::rule('/adminshop/Shoplbt/add','adminshop/Shoplbt/add');// 添加
Route::rule('/adminshop/Shoplbt/edit','adminshop/Shoplbt/edit');// 修改
Route::rule('/adminshop/Shoplbt/del','adminshop/Shoplbt/del');// 删除
//文章
Route::rule('/adminshop/article/index','adminshop/article/index');//公司 文章列表
Route::rule('/adminshop/article/add','adminshop/article/add');//添加
Route::rule('/adminshop/article/edit','adminshop/article/edit');//修改
Route::rule('/adminshop/article/delete','adminshop/article/delete');//删除
//公司活动管理
Route::rule('/adminshop/act/index','adminshop/act/index');//优惠活动
Route::rule('/adminshop/act/add','adminshop/act/add');// 添加
Route::rule('/adminshop/act/edit','adminshop/act/edit');// 修改
Route::rule('/adminshop/act/del','adminshop/act/del');// 删除
//公司修改密码
Route::rule('/adminshop/xgm/index','adminshop/xgm/index');//公司 文章列表
Route::rule('/adminshop/xgm/ajaxyuan','adminshop/xgm/ajaxyuan');//添加
Route::rule('/adminshop/xgm/edit','adminshop/xgm/edit');//修改
//ajax三级
Route::rule('/admin/Ajaxssq/ajaxcity','admin/Ajaxssq/ajaxcity');// 省市
Route::rule('/admin/Ajaxssq/ajaxarea','admin/Ajaxssq/ajaxarea');// 市区





