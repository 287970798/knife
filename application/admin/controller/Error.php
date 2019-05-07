<?php


namespace app\admin\controller;


class Error extends BaseController
{
    public function index()
    {
        $this->assign([
            'title'=>'该功能加发中...',
            'msg' => '该功能加发中...'
        ]);
        return $this->fetch('error/index');
    }
}