<?php


class Danli
{
    private static $instance = null;

    public static function getInstance()
    {
        if(self::$instance instanceof self){
            return self::$instance;
        }
        return self::$instance = new Danli();
    }

    public function connDb()
    {
        echo "我连上了sql,时间戳:".time(). PHP_EOL;
    }
}

/*
 * 作用：
 *      顾名思义不多bb了
 * 应用场景：
 *      ID生成器，数据库连接类，redis连接类 等等，一些比较耗资源的创建。保证只需要创建一次重复使用
 * 结果认证：
 * 检查两次打印的时间戳 如果一样就说明是同一个对象
 *
 *  我连上了sql,时间戳:1621418751
    我连上了sql,时间戳:1621418751

 */

Danli::getInstance()->connDb();

Danli::getInstance()->connDb();
