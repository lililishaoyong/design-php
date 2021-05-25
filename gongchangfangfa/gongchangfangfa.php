<?php


class gongchangfangfa
{

}

/*
 * 作用：定义一个创建对象的接口，让子类确定实例化哪一个类。工厂方法使一个类的实例化延伸其子类
 * 应用场景：创建对象需要大量重复代码
 */


/*
 * 手机
 */
class Phone
{
    protected $name;
    protected $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function make()
    {
        echo "品牌名称$this->name,颜色$$this->color";
    }
}

class XiaoMiPhone extends Phone
{
    protected $name;
    protected $color;

    public function __construct($name, $color)
    {
        parent::__construct($name, $color);
        $this->name = $name;
        $this->color = $color;
    }

    public function make()
    {
        echo "品牌名称小米：$this->name,颜色$this->color" . PHP_EOL;
    }
}

class HuaWeiPhone extends Phone
{
    protected $name;
    protected $color;

    public function __construct($name, $color)
    {
        parent::__construct($name, $color);
        $this->name = $name;
        $this->color = $color;
    }

    public function make()
    {
        echo "品牌名称华为：$this->name,颜色$this->color" . PHP_EOL;
    }
}

interface IFactory
{
    public function make();
}

class xiaomiFactory implements IFactory
{
    public function make()
    {
        return new XiaoMiPhone();
    }
}

class huaweiFactory implements IFactory
{
    public function make()
    {
        return new HuaWeiPhone();
    }
}

