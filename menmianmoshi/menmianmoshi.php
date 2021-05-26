<?php


class menmianmoshi
{
    /*
     * 门面模式 ： 又叫做外观模式，提供了一个统一的接口，用来访问子系统中的一群接口，主要特征是定义一个高层接口
     *          让子系统更容易使用，属于结构型设计模式
     *
     */
}

/*
 * 实名认证
 */
class ShiMingRenZheng
{
    private $erYaoSuService;
    private $renLianService;

    public function __construct()
    {
        $this->erYaoSuService = new ErYaoSuService();
        $this->renLianService = new RenLianService();
    }

    public function make()
    {
        $this->erYaoSuService->make();
        $this->renLianService->make();
        echo "实名认证最终通过了". PHP_EOL;
    }

}

/*
 * 二要素服务
 */
class ErYaoSuService
{
    public function make(){
        echo "二要素验证通过".PHP_EOL;
    }
}

/*
 * 人脸识别
 */
class RenLianService
{
    public function make(){
        echo "人脸识别通过".PHP_EOL;
    }
}



$service = new ShiMingRenZheng();
$service->make();

/*
 * 111222
 * 8888
 * 10
 * 11
 * 12
 */
