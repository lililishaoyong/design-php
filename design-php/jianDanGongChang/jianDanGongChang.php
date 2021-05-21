<?php


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

class FskFactory
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

$model = FskFactory::create('xiaomi');
$model->make();

$model = FskFactory::create('huawei');
$model->make();



