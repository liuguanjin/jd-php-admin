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

use \think\Route;
//后台接口
//根目录
Route::get('/','adminapi/index/index');
//查看验证码接口
Route::get('captcha/:id',"\\think\\captcha\\CaptchaController@index");
//获取验证码接口
Route::get('captcha','adminapi/login/captcha');
//前台登录接口
Route::post('homelogin','adminapi/login/homeLogin');
//前台注册接口
Route::post('homeregister','adminapi/login/homeRegister');
//后台管理员注册接口
Route::post('adminregister','adminapi/login/adminRegister');
//前台退出接口
Route::get('homelogout','adminapi/login/homeLogout');
//后台登录接口
Route::post('adminlogin','adminapi/login/adminLogin');
//后台退出接口
Route::get('adminlogout','adminapi/login/adminLogout');
//获取后台导航接口
Route::get('nav','adminapi/auth/nav');
//获取所有角色接口
Route::get('allrole','adminapi/role/getAllRole');
//获取所有品牌接口
Route::get('allbrands','adminapi/brand/getAllBrand');
//获取模型下的规格接口
Route::get('specs','adminapi/type/getSpec');
//获取模型下的规格值接口
Route::get('specvalues','adminapi/type/getSpecvalue');
//获取模型下的属性接口
Route::get('attrs','adminapi/type/getAttr');
//获取所有管理员接口
Route::get('alladmin','adminapi/admin/allAdmin');
//获取店铺下售出的宝贝接口
Route::get('soldgoods','adminapi/MyShop/soldGoods');
//获取店铺下所有宝贝接口
Route::get('mygoods','adminapi/MyShop/myGoods');
//获取店铺下未发货宝贝接口
Route::get('nosendgoods','adminapi/MyShop/nosend');
//获取店铺下所有评论接口
Route::get('evaluate','adminapi/MyShop/myEvaluate');
//商家修改评论中的商家回复
Route::put('update-shop-evaluate/:id','adminapi/MyShop/shopEvaluate');
//获取一条评论中的商家回复
Route::get('get-shop-evaluate/:id','adminapi/MyShop/getShopEvaluate');
//店铺下发货接口
Route::post('sendgoods/:id','adminapi/MyShop/sendgoods');
//权限增删改查接口
Route::resource('auths','adminapi/auth',[],['id' => '\d+']);
//管理员增删改查接口
Route::resource('admins','adminapi/admin',[],['id' => '\d+']);
//角色增删改查接口
Route::resource('roles','adminapi/role',[],['id' => '\d+']);
//分类增删改查接口
Route::resource('categorys','adminapi/category',[],['id' => '\d+']);
//品牌增删改查接口
Route::resource('brands','adminapi/brand',[],['id' => '\d+']);
//模型增删改查接口
Route::resource('types','adminapi/type',[],['id' => '\d+']);
//商品增删改查接口
Route::resource('goods','adminapi/goods',[],['id' => '\d+']);
//属性增删改查接口
Route::resource('attr','adminapi/attr',[],['id' => '\d+']);
//规格增删改查接口
Route::resource('spec','adminapi/spec',[],['id' => '\d+']);
//店铺增删改查接口
Route::resource('store','adminapi/shop',[],['id' => '\d+']);
//单图片上传接口
Route::post('logo','adminapi/upload/logo');
//多图片上传接口
Route::post('images','adminapi/upload/images');
//管理员获取商品销售排行的接口
Route::get('goods-sale-ranking','adminapi/Report/goodsSaleRanking');
//管理员获取店铺销售排行的接口
Route::get('shops-sale-ranking','adminapi/Report/shopsSaleRanking');
//管理员获取销售额排行的接口
Route::get('sales-ranking','adminapi/Report/salesRanking');
//管理员获取销售订单统计的接口
Route::get('sales-order','adminapi/Report/salesOrderStatistics');
//管理员更改店铺推荐的接口
Route::get('shop-recommend/:id','adminapi/Recommend/shopRecommend');
//管理员更改商品推荐的接口
Route::get('goods-recommend/:id','adminapi/Recommend/goodsRecommend');
//管理员更改品牌推荐的接口
Route::get('brand-recommend/:id','adminapi/Recommend/brandRecommend');
//管理员admin评价管理界面
Route::get('evaluate-admin','adminapi/Evaluate/index');
//管理员admin修改评论是否展示
Route::get('evaluate-show/:id','adminapi/Evaluate/evaluateShow');
//商铺修改评论是否精选 展示在商品页
Route::get('evaluate-choice/:id','adminapi/Evaluate/evaluateChoice');
