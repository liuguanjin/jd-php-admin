<?php

namespace app\adminapi\controller;

use think\Controller;

class Recommend extends BaseApi
{
    //管理员更改店铺推荐的接口
    public function shopRecommend($id="")
    {
        $data = \app\adminapi\model\Shop::find($id);
        if ($data['is_recommend'] === 1){
            \app\adminapi\model\Shop::where('id','=',$id)->setField('is_recommend',0);
        }elseif ($data['is_recommend'] === 0){
            \app\adminapi\model\Shop::where('id','=',$id)->setField('is_recommend',1);
        }else{
            $this->fail('查询店铺失败');
        }
        $this->ok();
    }
    //管理员更改商品推荐的接口
    public function goodsRecommend($id="")
    {
        $data = \app\adminapi\model\Goods::find($id);
        if ($data['is_recommend'] === 1){
            \app\adminapi\model\Goods::where('id','=',$id)->setField('is_recommend',0);
        }elseif ($data['is_recommend'] === 0){
            \app\adminapi\model\Goods::where('id','=',$id)->setField('is_recommend',1);
        }else{
            $this->fail('查询商品失败');
        }
        $this->ok();
    }
    //管理员更改品牌推荐的接口
    public function brandRecommend($id="")
    {
        $data = \app\adminapi\model\Brand::find($id);
        if ($data['is_recommend'] === 1){
            \app\adminapi\model\Brand::where('id','=',$id)->setField('is_recommend',0);
        }elseif ($data['is_recommend'] === 0){
            \app\adminapi\model\Brand::where('id','=',$id)->setField('is_recommend',1);
        }else{
            $this->fail('查询品牌失败');
        }
        $this->ok();
    }
}
