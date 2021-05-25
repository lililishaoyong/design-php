<?php


class chouxianggongchang
{
    /*
     * 抽象工厂模式
     *
     * 所有在用简单工厂的地方，都可以考虑用反射技术来去除switch或if，解除分支判断代码的耦合。
     */

    /*
     *  class FskFactory
        {
            public static function create($str)
            {
                switch ($str){
                    case 'xiaomi':
                        $model = new XiaoMiPhone('xiaomi-10','玫瑰金');
                        break;
                    case 'huawei':
                        $model = new HuaWeiPhone('荣耀12', '简约白');
                        break;
                    default:
                        $model = null;
                }

                return $model;
            }
        }

     *
     * 抽象代替具体
     */

    public static function create($className)
    {
        $class = $className. 'Phone';
        $model = new $class;
        return $model;
    }
}
