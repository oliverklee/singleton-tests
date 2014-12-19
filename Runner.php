<?php
require_once 'Singleton.php';

echo 'Enabling garbage collection.' . chr(10);
gc_enable();

echo 'Creating two instances via getInstance.' . chr(10);

$instance1 = Singleton::getInstance();

$instance2 = Singleton::getInstance();

$instancesAreIdentical = $instance1 === $instance2;
$idsAreIdentical = $instance1->getId() === $instance2->getId();

echo 'Both instances are ' . (!$instancesAreIdentical ? 'not ' : '') . 'identical.' . chr(10);
echo 'Both instances have ' . (!$idsAreIdentical ? 'not ' : '') . 'the same ID.' . chr(10);

$id = $instance1->getId();
$data = Singleton::getStaticData();

echo 'Unsetting both instances.' . chr(10);
unset($instance1, $instance2);

echo 'Triggering the garbage collection.' . chr(10);
gc_collect_cycles();

echo 'Creating a new instance (even with a new name).' . chr(10);

$instance3 = Singleton::getInstance();

$thirdIdIsIdentical = $instance3->getId() === $id;
echo 'The new instances has ' . (!$thirdIdIsIdentical ? 'not ' : '') . 'the same ID as the first one.' . chr(10);

echo 'Unsetting the new instance.' . chr(10);
unset($instance3);

echo 'Dropping the static instance.' . chr(10);
Singleton::dropInstance();

echo 'Triggering the garbage collection.' . chr(10);
gc_collect_cycles();

$staticDataIsIdentical = Singleton::getStaticData() === $data;
echo 'The static data is ' . (!$staticDataIsIdentical ? 'not ' : '') . 'the same as before the unset.' . chr(10);

$allIsIdentical = $instancesAreIdentical && $idsAreIdentical && $thirdIdIsIdentical && $staticDataIsIdentical;

exit($allIsIdentical ? 0 : 1);
