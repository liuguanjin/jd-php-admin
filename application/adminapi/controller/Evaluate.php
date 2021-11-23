<?php

namespace app\adminapi\controller;

use think\Controller;

class Evaluate extends BaseApi
{
    /**
     * 管理员admin的评论管理
     *
     * @keyword 搜索评论的关键词
     * @admin_id 查看的管理员id 1为超级管理员
     */
    public function index()
    {
        $params = input();
        $where = [];
        if (!empty($params['keyword'])){
            $where['content|nickname'] = ['like',"%{$params['keyword']}%"];
        }
        $admin_id = $params['admin_id'];
        if (empty($admin_id)){
            $this->fail('用户信息错误');
        }elseif ($admin_id == 1){
            $evaluate = \app\adminapi\model\Evaluate::alias('t1')
                ->join('jd_user t2','t1.user_id=t2.id','left')
                ->join('jd_goods t3','t1.goods_id=t3.id','left')
                ->join('jd_shop t4','t1.shop_id=t4.id','left')
                ->field('t1.*,t2.nickname,t3.goods_name,t4.shop_name')
                ->where($where)
                ->paginate(10);
            $this->ok($evaluate);
        }else{
            $this->fail('您无权限查看！');
        }
    }
    /**
     * 管理员admin修改评论是否展示
     *
     * @id 评论的id
     */
    public function evaluateShow($id="")
    {
        $data = \app\adminapi\model\Evaluate::find($id);
        if ($data['is_show'] === 1){
            \app\adminapi\model\Evaluate::where('id','=',$id)->setField('is_show',0);
        }elseif ($data['is_show'] === 0){
            \app\adminapi\model\Evaluate::where('id','=',$id)->setField('is_show',1);
        }else{
            $this->fail('查询评论失败');
        }
        $this->ok();
    }
    /*
     *用于商铺更改该评论是否显示在商品页 只显示两个
     * @param $id int 评论的id
     */
    public function evaluateChoice($id)
    {
        if (empty($id)){
            $this->fail('评论id不合法');
        }
        $data = \app\adminapi\model\Evaluate::find($id);
        if ($data['is_choice'] === 1){
            \app\adminapi\model\Evaluate::where('id','=',$id)->setField('is_choice',0);
        }elseif ($data['is_choice'] === 0){
            \app\adminapi\model\Evaluate::where('id','=',$id)->setField('is_choice',1);
        }else{
            $this->fail('查询评论失败');
        }
        $this->ok();
    }
}
