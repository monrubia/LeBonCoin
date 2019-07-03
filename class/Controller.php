<?php

require_once(dirname(__FILE__).'/../vendor/autoload.php');

abstract class Controller
{
    protected $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(dirname(__FILE__) . '/../templates');
        $this->smarty->setCompileDir(dirname(__FILE__) . '/../compile');
        $this->smarty->setCacheDir(dirname(__FILE__) . '/../cache');
    }

    //permet d'exécuter le contrôleur
    public function render($template, $assign)
    {
	    $this->smarty->assign($assign);
        $this->smarty->display($template);
    }
}
