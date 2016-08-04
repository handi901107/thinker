<?php
/**
 * Created by PhpStorm.
 * User: handi
 * Date: 2016/8/3
 * Time: 21:35
 */
class Framework{
    public static function run(){
        self::init();
        self::autoload();
        self::dispatch();
    }
    //初始化方法
   private static function init(){
       //路径的常量
       define("DS",DIRECTORY_SEPARATOR);
       define("ROOT",getcwd(). DS);
       define("APP_PATH",ROOT."Application" .DS);
       define("FRAMEWORK_PATH",ROOT."Framework".DS);
       define("PUBLIC_PATH",ROOT ."Public".DS);
       define("CONFIG_PATH",APP_PATH."Config".DS);
       define("CONTROLLER_PATH",APP_PATH."Controller".DS);
       define("MODEL_PATH",APP_PATH."View".DS);
       define("CORE_PATH",FRAMEWORK_PATH."Core".DS);
       define("DB_PATH",FRAMEWORK_PATH."Database".DS);
       define("hELPS_PATH",FRAMEWORK_PATH,"Helps".DS);
       define("LIB_PATH",FRAMEWORK_PATH."Libraies".DS);
       define("UPLOADS_PATH",PUBLIC_PATH."upload".DS);
       define("PLATFORM",isset($_GET['p']) ? $_GET['p']:"Admin");
       define("CONTROLLER",isset($_GET['c']) ? ucfirst($_GET['c']):"Index");
       define("ACTION",isset($_GET['a']) ? $_GET('a'):"index");
       define("CUR_CONTROLLER_PATH",CONTROLLER_PATH.PLATFORM.DS);
       define("CUR_VIEW_PATH",VIEW_PATH.PLATFORM.DS);


    }
    //路由封发  即实例化对象
    private static  function dispatch(){
         $controller_name = CONTROLLER."Controller";
         $action_name = ACTION."Action";
         $controller =new $controller_name;
         $controller -> $action_name;
    }
    //自动载入
    private static  function autoload(){
         spl_autoload_register('load');

    }
    //完成指定类的加载
    public function load($classname){
        if(substr($classname, -10)=='Controller'){
            include CUR_CONTROLLER_PATH."{$classname}.class.php";
        }elseif (substr($classname -5)=="Model"){
            include MODEL_PATH."{$classname}.class.php";
        }else{
            //暂略
        }
    }
}
   
    