<?php
// demo of inversion principle in php
// rule: client should not be forced to implement an interface that it does not use
interface WorkerInterface
{
    public function work();

    public function sleep();
}

class HumanWorker implements WorkerInterface
{
    public function work()
    {
        print 'human worker is working' . PHP_EOL;
    }

    public function sleep ()
    {
        print 'human worker is sleeping' . PHP_EOL;
    }
}

class AndroidWorker implements WorkerInterface
{
    public function work()
    {
        print 'android worker is working' . PHP_EOL;
    }

    public function sleep()
    {
        // print 'android worker is sleeping ?????' . PHP_EOL;
        return null;
    }
}

class Captain
{
    public function manage(WorkerInterface $worker)
    {
        $worker->work();
        $worker->sleep();
    }
}

$aHumanWorker = new HumanWorker();
$anAndroidWorker = new AndroidWorker();
$captain = new Captain();

// manage human worker
$captain->manage($aHumanWorker);
// manage android worker
$captain->manage($anAndroidWorker);
