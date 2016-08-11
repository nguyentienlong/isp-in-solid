<?php
// demo of inversion principle in php
// rule: client should not be forced to implement an interface that it does not use
interface WorkableInterface
{
    public function work();
}

interface SleepableInterface
{
    public function sleep();
}

class HumanWorker implements WorkableInterface, SleepableInterface
{
    public function work()
    {
        print 'human worker is working' . PHP_EOL;
    }

    public function sleep()
    {
        print 'human worker is sleeping' . PHP_EOL;
    }
}

class AndroidWorker implements WorkableInterface
{
    public function work()
    {
        print 'android worker is working' . PHP_EOL;
    }
}

class Captain
{
    public function manage(WorkableInterface $worker)
    {
        $worker->work();

        if ($worker instanceof AndroidWorker) return; // this violate open close principle

        $worker->sleep();
    }
}

$aHumanWorker = new HumanWorker();
$captain = new Captain();
$captain->manage($aHumanWorker);

$anAndroidWorker = new AndroidWorker();
$captain->manage($anAndroidWorker);
