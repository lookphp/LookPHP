<?php
/**
 * Created by PhpStorm.
 * User: Cral
 * Date: 2016/12/24 0024
 * Time: 下午 2:51
 */

namespace app\controller;

use \Latte;
use app\model\ToDo;

class HomeController extends BaseController
{
    public function show()
    {
        echo 'home,show';
    }

    public function migrate(){
        $migrator = new \Pheasant\Migrate\Migrator();
        $migrator->initialize(ToDo::schema());
    }

    public function create(){

        $todo = new ToDo();
        $todo->title = '设计自己的mvc框架';
        $todo->status = true;
        $todo->save();
    }


    public function showAll(){
        $todos = ToDo::all();
        foreach ($todos as $todo){
            $result[] = $todo->title;
        }
        $latte = new Latte\Engine;
        $latte->setTempDirectory(APP_ROOT.'/view/');
        $parameters['items'] = $result; 
        $latte->render(APP_ROOT.'/view/template.latte', $parameters);
    }

    public function one(){
        $todos = ToDo::byId('1');
        echo '<pre>';
        var_dump($todos);
        echo $todos;
    }
}