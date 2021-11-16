<?php

namespace app\adminapi\controller;

use think\Controller;

class Report extends BaseApi
{
    //商品销售排行
    public function goodsSaleRanking()
    {
        $goodsSaleRanking = \app\adminapi\model\Goods::with('shop_row')->order('sales_num','desc')->limit(0,6)->select();
        if (empty($goodsSaleRanking)){
            $this->fail('查询失败,服务器断开连接');
        }
        $this->ok($goodsSaleRanking);
    }
    //商品销售排行
    public function shopsSaleRanking()
    {
        $shopsSaleRanking = \app\adminapi\model\Shop::order('sales_num','desc')->limit(0,6)->select();
        if (empty($shopsSaleRanking)){
            $this->fail('查询失败,服务器断开连接');
        }
        $this->ok($shopsSaleRanking);
    }
    //销售额排行
    public function salesRanking()
    {
        $data = \app\adminapi\model\Goods::with('shop_row')->order('sales desc')->limit(0,6)->select();
        $this->ok($data);
    }
    //销售订单统计
    public function salesOrderStatistics()
    {
        $params = input();
        $where = [];
        if ($params['keywords']){
            $where['order_sn'] = ['like',"%{$params['keywords']}%"];
        }
        $sale_order = \app\homeapi\model\Order::where($where)->order('id asc')->paginate(10);
        $this->ok($sale_order);
    }
}
