<?php


namespace app\admin\controller;


use think\Controller;

class BaseController extends Controller
{
    public function _empty()
    {
        $this->assign([
            'title' => '操作不存在',
            'msg' => '操作不存在'
        ]);
        $this->fetch('empty');
    }
}