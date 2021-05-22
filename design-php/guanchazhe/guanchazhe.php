<?php


class guanchazhe
{
    /*
     * 观察者模式
     *          定义了一种一对多的依赖关系，让多个观察者对象同时监听某一个主题对象。这个主题对象在状态发生变化时，会通知所有观察者对象，
     *      使它们能够自动更新自己。
     *          将一个系统分割成一系列相互协作的类有一个很不好的副作用，那就是要维护相关对象间的一致性。我们不希望为了维持一致性而使各类紧密耦合，
     *      这样会给维护、扩展和重用都带来不便。
     *          观察者模式所做的工作其实就是在接触耦合。让耦合的双方都依赖于抽象，而不是依赖于具体。从而使得各自的变化都不会影响另一边的变化。
     * 应用场景：
     *      用户注册完，需要后续的一系列操作
     *      订单完成后之后的一系列操作
     */
}

/*
 * 事件抽象类
 */
abstract class Event
{
    /**
     * @var ObServer[] $obServers
     */
    private $obServers = [];

    public function add(ObServer $obServer)
    {
        array_push($this->obServers, $obServer);
    }

    public function notify()
    {
        foreach ($this->obServers as $obServer){
            $obServer->update();
        }
    }
}

abstract class ObServer
{
    abstract public function update();
}

class KUCunObserver extends ObServer
{
    public function update()
    {
        echo "订单关联商品库存更新" . PHP_EOL;
    }
}
class SMSObserver extends ObServer
{
    public function update()
    {
        echo "发送短信通知" . PHP_EOL;
    }
}

class Order extends Event
{
    public function create()
    {
        echo "创建订单完成" . PHP_EOL;
        $this->notify();
    }
}

$order = new Order();
$order->add(new KUCunObserver());
$order->add(new SMSObserver());
$order->create();

/*
 * 观察者通过配置文件动态载入
 */

$config = [
    'order_observer' => [
        KUCunObserver::class,
        SMSObserver::class,
        //todo ...
    ],
];
$order1 = new Order();
$obServers = $config['order_observer'];
foreach ($obServers as $class){
    $order1->add(new $class);
}
$order1->create();