<?php
require_once(FRAME.SEP.'extension'.SEP.'smarty'.SEP.'Smarty.class.php');
class frameSmarty
{
    private static $smarty;
    private function __construct()
    {
    }
    public static function get_instance()
    {
        if(self::$smarty == null)
        {
            $smartyClass = new Smarty();
            $smartyClass->setTemplateDir(APP.SEP.'views'.SEP.'templates'.SEP);
            $smartyClass->setCompileDir(APP.SEP.'views'.SEP.'templates'.SEP);
            self::$smarty = $smartyClass;
        }
        return self::$smarty;
    }
}



