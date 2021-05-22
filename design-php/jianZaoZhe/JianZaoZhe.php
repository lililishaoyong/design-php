<?php


class JianZaoZhe
{

    /*
     * 建造者模式
     * 创建型设计模式
     * 将一个复杂的对象构建过程与他的表示分离，使得同样的构建过程可以创建不同的表示，属于创建型设计模式
     * （使用接口规定行为，然后由具体的实现类进行构造）
     */
}

interface carBuilder
{
    public function buildCheShen();

    public function buildNeishi();

    public function buildFaDongJi();
}

class GaoPeiCar implements carBuilder
{
    public function buildCheShen()
    {
        echo "豪华金" . PHP_EOL;
    }

    public function buildFaDongJi()
    {
        echo "V30发动机" . PHP_EOL;
    }

    public function buildNeishi()
    {
        echo "真皮内饰". PHP_EOL;
    }
}

class DiPeiCar implements carBuilder
{
    public function buildCheShen()
    {
        echo "铝合金" . PHP_EOL;
    }

    public function buildFaDongJi()
    {
        echo "V1.0发动机" . PHP_EOL;
    }

    public function buildNeishi()
    {
        echo "草席内饰". PHP_EOL;
    }
}

class BWMDirector
{
    private $car;

    public function __construct(carBuilder $carBuilder)
    {
        $this->car = $carBuilder;
    }

    public function create()
    {
        $this->car->buildCheShen();
        $this->car->buildFaDongJi();
        $this->car->buildNeishi();
    }
}

echo "豪华版配置". PHP_EOL;

$director = new BWMDirector(new GaoPeiCar());
$director->create();

echo "入门级". PHP_EOL;

$director2 = new BWMDirector(new DiPeiCar());
$director2->create();