<?php
class Controller
{
    //构造函数
    public function __construct()
    {
    }
    public function loadFile($fileName)
    {
            if(file_exists($fileName))
            {
                require_once($fileName);
            }
            else
            {
                echo "No such file or directory ".$fileName;
            }
    }
    //载入模型
    public function  load_model($className)
    {
        $this->loadFile(APP.SEP.'models'.SEP.$className.'.php');
        $className = ucfirst($className);
        return new $className();
    }
    //渲染视图
    public function render($viewName,$data)
    {
        //集成SMARTY
        $this->loadFile(FRAME.SEP.'extension'.SEP.'frameSmarty.php');
        $smarty = frameSmarty::get_instance(); 
        foreach($data as $key => $name)
        {
            $smarty->assign($key,$name);
        }
        $smarty->display($viewName.'.tpl');
        //直接显示
        #$this->loadFile(APP.SEP.'views'.SEP.$viewName.'.tpl');
    }

    public function db()
    {
         $this->loadFile(FRAME.SEP.'database'.SEP.'DSN.php');
         $this->loadFile(FRAME.SEP.'database'.SEP.'DB.php');
         return new DB();
    }

}
