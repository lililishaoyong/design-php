<?php


class zhuangtaimoshi
{
    /*
     * 状态模式
     *  状态模式主要解决的当控制一个对象状态转换的条件表达式过于复杂时的情况。把状态的判断逻辑转移到表示不同状态的一系列类当中，可以把复杂的判断逻辑简单化
     *  责任分解 解耦
     *  消除了庞大的条件分支语句
     *
     * 应用：
     *      当一个对象的行为取决于它的状态，并且它必须在运行时刻根据状态改变它的行为时，就可以考虑使用状态模式了
     */
}

abstract class State
{
    abstract public function handle(AuditWork $work);
}

class StateA extends State
{
    public function handle(AuditWork $work)
    {
        echo "A 审核通过".PHP_EOL;
        $work->setState(new StateB());
        $work->handle();
    }
}

class StateB extends State
{
    public function handle(AuditWork $work)
    {
        echo "B 审核通过".PHP_EOL;
        $work->setState(new StateC());
        $work->handle();
    }
}

class StateC extends State
{
    public function handle(AuditWork $work)
    {
        echo "C 审核通过".PHP_EOL;
    }
}

class AuditWork
{
    private $current;

    public function __construct()
    {
        $this->current = new StateA();
    }

    public function setState(State $state)
    {
        $this->current = $state;
    }

    public function handle()
    {
        $this->current->handle($this);
    }
}

$auditWork = new AuditWork();
$auditWork->handle();
