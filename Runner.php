<?php
require_once 'Singleton.php';

echo 'Creating two instances via getInstance.' . chr(10);

$instance1 = Singleton::getInstance();

echo chr(10) . 'Sleeping for one second.' . chr(10) . chr(10);
sleep(1);

$instance2 = Singleton::getInstance();

echo 'Both instances are ' . (($instance1 !== $instance1) ? 'not ' : '') . 'identical.' . chr(10);
echo 'Both instances have ' . (($instance1->getId() !== $instance1->getId()) ? 'not ' : '') . 'the same ID.' . chr(10);

$id = $instance1->getId();
$data = Singleton::getStaticData();

echo 'Unsetting both instances.' . chr(10);

unset($instance1, $instance2);

echo chr(10) . 'Sleeping for one second.' . chr(10) . chr(10);
sleep(1);

echo 'Creating a new instance (even with a new name).' . chr(10);

$instance3 = Singleton::getInstance();
echo 'The new instances has ' . (($instance3->getId() !== $id) ? 'not ' : '') . 'the same ID as the first one.' . chr(10);
echo 'The static data is ' . ((Singleton::getStaticData() !== $data) ? 'not ' : '') . 'the same as before the unset.' . chr(10);
