<?php


class beiwanglu
{
    /*
     * 备忘录模式
     *  在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之前保存这个状态。这样以后就可将该对象恢复到原先保存的状态。
     */
}

class Originator
{
    private $state;
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function createMemento()
    {
        return new Memento($this->state);
    }

    public function setMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }

    public function show()
    {
        echo "status".$this->state. PHP_EOL;
    }
}

class Memento
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}


class CareTaker
{
    private $memento;

    public function getMemento()
    {
        return $this->memento;
    }

    public function setMemento(Memento $memento)
    {
        $this->memento = $memento;
    }
}

//客户端程序
$o = new Originator(); //Originator初始状态，状态属性on
$o->setState("On");
$o->show();

//保存状态时，由于有了很好的封装，可以隐藏Originator的实现细节
$c = new CareTaker();
$c->setMemento($o->createMemento());

// 改变属性
$o->setState("Off");
$o->show();

// 恢复属性
$o->setMemento($c->getMemento());
$o->show();