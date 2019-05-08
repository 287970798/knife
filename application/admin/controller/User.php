<?php


namespace app\admin\controller;

use app\common\model\User as Model;

class User extends BaseController
{
    public function all()
    {
        $all = Model::order('id desc')->all();
        return json(formatApi(0, '成功', $all));
    }

    public function index()
    {
        $all = Model::order('id DESC')->all();

        $this->assign([
            'title' => '用户管理',
            'all' => $all
        ]);
        return $this->fetch();
    }

    public function add()
    {
        if (!$this->request->isPost()) {
            return false;
        }

        $post = $this->request->post();
        $post['password'] = sha1($post['password']);

        $model = new Model();
        $res = $model->save($post);
        if ($res) {
            $ret = formatApi(0, '成功', $model);
        } else {
            $ret = formatApi(1, '失败', $res);
        }
        return json($ret);
    }
    public function edit()
    {
        if (!$this->request->isPost()) {
            return false;
        }
        $id = $this->request->param('id');
        $post = $this->request->post();
        if ($post['password'] != '') {
            $post['password'] = sha1($post['password']);
        } else {
            unset($post['password']);
        }
        unset($post['create_time']);
        unset($post['update_time']);
        unset($post['delete_time']);

        $model = new Model();
        $res = $model->allowField(true)->save($post,['id'=>$id]);
        if ($res) {
            $ret = formatApi(0, '成功', $model);
        } else {
            $ret = formatApi(1, '失败', $res);
        }
        return json($ret);
    }

    public function detail()
    {
        $id = $this->request->param('id');
        $detail = Model::get($id);
        return json(formatApi(0, '成功', $detail));
    }
}