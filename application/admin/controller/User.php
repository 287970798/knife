<?php


namespace app\admin\controller;

use app\common\model\User as Model;

class User extends BaseController
{
    public function index()
    {
        $all = Model::all();

        $this->assign([
            'title' => '用户管理',
            'all' => $all
        ]);
        return $this->fetch();
    }
}