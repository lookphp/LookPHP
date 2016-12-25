<?php
/**
 * ==============================================
 * Copy right 2013-2016 http://www.lookphp.cn
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 * @author: liuxingwang 
 * @date: 2016年12月25日 下午1:40:47
 * @version: v1.0.0
 */
namespace app\controller;

use \Latte;
use app\model\ToDo;

class NewsController extends BaseController
{
    public function index() {
        $todos = ToDo::all();
        $result = [];
        foreach ($todos as $todo){
            $item['id'] = $todo->id;
            $item['title'] = $todo->title;
            $item['status'] = $todo->status;
            $result[] = $item;
        }
//         echo '<pre>';
//         var_dump($result);
//         exit;
        $parameters['items'] = $result;
        $latte = new Latte\Engine;
        $latte->setTempDirectory(APP_ROOT.'/view/template_c/');
        $latte->render(APP_ROOT.'/view/template/news/index.latte',$parameters);
    }
    
    public function create()
    {
        $title = trim($_POST['title']);
        $todo = new ToDo();
        $todo->title = $title;
        $todo->status = true;
        $result = $todo->save();
        if($result)
            echo 'success';
        else
            echo 'fail';
    }
    
    public function update()
    {
        $id = $_POST["id"];
        $update = ToDo::byId($id);
        $update->status = false;
        $result = $update->save();
        if($result)
            echo 1;
        else
            echo 0;
    }
    
    public function delete()
    {
        $id = $_POST["id"];
        $delete = ToDo::byId($id);
        $result = $delete->delete();
        if($result)
            echo 1;
        else
            echo 0;
    }
}