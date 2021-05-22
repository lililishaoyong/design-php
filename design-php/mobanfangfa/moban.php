<?php


class moban
{

    /*
     *  作用：
     *      模版方法模式是通过把不变行为搬移到超类，去除子类中的重复代码来体现它的优势。提供了一个很好的代码复用平台。
     *      当不变的和可变的行为在方法的子类实现中混合在一起的时候，不变的行为就会在子类中重复出现。通过模版方法把这些行为搬移到单一的地方，
     *      这样就帮助子类摆脱重复的不变行为的纠缠。
     *
     *
     *
     *
     *
     *
     *
     *
     */
}

class TestPater
{
    public function question1()
    {
        echo "杨过说过，后来给了郭靖，炼成倚天剑、屠龙刀的玄铁可能是［］a.球磨铸铁 b.马口铁 c.高速合金钢 d.碳素纤维" . PHP_EOL;
        echo "答案{$this->answer1()}". PHP_EOL;
    }

    public function question2()
    {
        echo "杨过、程英、陆无双铲除了情花，造成［］a.使这种植物不在害人 b.使一种珍惜物种灭绝 c.破坏了那个生态圈的生态平衡 d.造成该地区沙漠化 \n";
        echo "答案 ".$this->answer2()."\n";
    }

    public function question3()
    {
        echo "蓝凤凰致使华山师徒、桃谷六仙呕吐不止，如果你是大夫，会给他们开什么药［］a.阿司匹林 b.牛黄解毒片 c.氟哌酸 d.让他们喝大量的生牛奶 e.以上全不对 \n";
        echo "答案 ".$this->answer3()."\n";
    }

    public function answer1()
    {
        return '';
    }
    public function answer2()
    {
        return '';
    }
    public function answer3()
    {
        return '';
    }

}


class TestPaperA extends TestPater
{
    public function answer1()
    {
        return 'a';
    }

    public function answer2()
    {
        return 'a';
    }

    public function answer3()
    {
        return 'a';
    }
}

class TestPaperB extends TestPater
{
    public function answer1()
    {
        return 'b';
    }

    public function answer2()
    {
        return 'b';
    }

    public function answer3()
    {
        return 'b';
    }
}

echo "学生甲抄的试卷: \n";
$student = new TestPaperA();
$student->question1();
$student->question2();
$student->question3();
echo "学生乙抄的试卷: \n";
$student2 = new TestPaperB();
$student2->question1();
$student2->question2();
$student2->question3();