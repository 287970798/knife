<?php


namespace app\admin\controller;


class Index extends BaseController
{
    public function index()
    {
        $this->assign([
            'title' => 'Knife CRM'
        ]);
        return $this->fetch();
    }
}