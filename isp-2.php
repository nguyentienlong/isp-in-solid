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

interface ManagableInterface
{
    public function beManaged();
}

class HumanWorker implements WorkableInterface, SleepableInterface, ManagableInterface
{
    public function work()
    {
        print 'human worker is working' . PHP_EOL;
    }

    public function sleep()
    {
        print 'human worker is sleeping' . PHP_EOL;
    }

    public function beManaged()
    {
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements WorkableInterface, ManagableInterface
{
    public function work()
    {
        print 'android worker is working' . PHP_EOL;
    }

    public function beManaged()
    {
        $this->work();
    }
}

class Captain
{
    public function manage(ManagableInterface $worker)
    {
        $worker->beManaged();
    }
}

$aHumanWorker = new HumanWorker();
$captain = new Captain();
$captain->manage($aHumanWorker);

$anAndroidWorker = new AndroidWorker();
$captain->manage($anAndroidWorker);
