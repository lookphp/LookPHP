<?php
/**
 * Created by PhpStorm.
 * User: my
 * Date: 2016/12/24
 * Time: 14:52
 * 用来连接数据库，加载model库Pheasant
 */
namespace app\controller;
use \Pheasant;
// use \Latte;

class BaseController
{

    private $config;

    public function __construct()
    {
        $this->loadConfig();
        $this->initDb();
        $this->initLatte();
    }

    public function initDb()
    {
    	$pheasant = new Pheasant();
        $pheasant::setup($this->config['dsn']);
    }

    public function loadConfig()
    {
        $this->config = require APP_ROOT . '/config/base.php';
    }
    
    public function initLatte()
    {
//         $latte = new Latte\Engine;
//         $latte->setTempDirectory(APP_ROOT.'/view/');
//         $parameters['items'] = ['one', 'two', 'three'];
//         $latte->render(APP_ROOT.'/view/template.latte', $parameters);
    }

}
