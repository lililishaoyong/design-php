<?php

/*
 * 装饰模式
 */
class ZhuangShi
{

}

/*
 * 结算抽象类
 */
abstract class settlement
{
    /*
     * 计算订单价格
     */
    abstract public function countPrice();

    /*
     * 订单价格计算描述信息
     */
    abstract public function setMsg();
}

class OrderSettlement extends settlement
{

    public function setMsg()
    {
       return '订单原价';
    }

    public function countPrice()
    {
        echo "原价100元" . PHP_EOL;
        return 100;
    }
}

/*
 * 订单装饰类
 */
abstract class OrderDecorator extends settlement
{
    /**
     * @var Settlement
     */
    protected $settlement;

    public function __construct(settlement $settlement)
    {
        $this->settlement = $settlement;
    }

    public function countPrice()
    {
        return $this->settlement->countPrice();
    }

    public function setMsg()
    {
        return $this->settlement->setMsg();
    }
}

/*
 * 使用优惠卷
 */
class TicketOrder extends OrderDecorator
{
    protected $settlement;
    public function __construct(Settlement $settlement)
    {
        parent::__construct($settlement);
        $this->settlement = $settlement;
    }

    public function countPrice()
    {
        $price = parent::countPrice() - 5;
        echo '使用优惠卷减5元' . PHP_EOL;
        return $price;
    }

    public function setMsg()
    {
        return parent::setMsg() . '使用了一个5元优惠卷';
    }
}

/*
 * 使用期卡
 */
class TermCardOrder extends OrderDecorator
{
    protected $settlement;
    public function __construct(Settlement $settlement)
    {
        parent::__construct($settlement);
        $this->settlement = $settlement;
    }

    public function countPrice()
    {
        $price = parent::countPrice() - 2;
        echo "使用期卡减2元" . PHP_EOL;
        return $price;
    }

    public function setMsg()
    {
        return parent::setMsg() . '使用了一个2元期卡';
    }
}

/*
 * 装饰器模式
 * 作用：
 *  动态地给一个对象添加一些额外的职责，就增加功能来说，装饰模式比生成子类更为灵活。
    装饰模式是为已有功能动态的添加更多功能的一种方式。
    当系统需要新功能的时候，是向旧的类中添加新的代码。这些新的代码通常装饰了原有类的核心职责或主要行为。
    在主类中加入新的字段，新的方法和新的逻辑，从而增加了主类的复杂度，而这些新加入的东西仅仅是为满足一些只在某种特定情况下才会执行的特殊行为的需要。
    装饰模式却提供了一个非常好的解决方案，它把每个要装饰的功能放在单独的类中，并让这个类包装它要装饰的对象，对此，当需要执行特殊行为时，
    客户代码就可以在运行时根据需要选择地，按顺序地使用装饰功能包装对象了。
    装饰模式的优点就是把类中的装饰功能从类中搬移去除，这样可以简化原有的类。
    有效地把类的核心职责和装饰功能区分开了，而且可以去除相关类中的重复的装饰逻辑。
 *
 *  应用场景：
 *      电商订单结算模块。会有很多优惠活动。常规的就是在订单结算业务类 通过ifelse 进行添加修改。违反了开闭原则，单一职责
 *      使用装饰器模式可以动态的添加移除优惠功能如上代码案例。
 *  结果认证：
 *      控制台打印输出：
        原价100元
        使用优惠卷减5元
        使用期卡减2元
        最终需要支付的订单金额93
        订单结算信息订单原价使用了一个5元优惠卷使用了一个2元期卡

 */

//写法一

//$settlement = new OrderSettlement();
//
//$settlement = new TicketOrder($settlement);
//
//$settlement = new TermCardOrder($settlement);

/*
 * 写法二
 * 换个写法
 * 将优惠结算写进配置里，进行可配置华
 * 这样后期根据业务进行订单结算变动。不需要修改代码，只需要对订单结算装饰器配置进行增减
 * 符合 可配置化设计思想
 */
//从配置文件中读取配置
$config = [
    'order_settlement' => [
        TicketOrder::class,
        TermCardOrder::class,
    ]
];
$settlementConfig = $config['order_settlement'];

$settlement = new OrderSettlement();
foreach ($settlementConfig as $class){
    $settlement = new $class($settlement);
}

echo '最终需要支付的订单金额'.$settlement->countPrice() . PHP_EOL;
echo '订单结算信息' . $settlement->setMsg(). PHP_EOL;
