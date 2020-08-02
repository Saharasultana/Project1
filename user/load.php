<?php
$data = array();

$data[] = array(
    'id'   => 1,
    'title'   => 'Take a walk',
    'start'   => '2020-08-01 00:00:01',
    'end'   => '2020-08-01 02:00:01'
);
$data[] = array(
    'id'   => 2,
    'title'   => 'Drink water',
    'start'   => '2020-08-02 00:00:01',
    'end'   => '2020-08-01 02:00:01'
);
$data[] = array(
    'id'   => 3,
    'title'   => 'Eat Vegetables',
    'start'   => '2020-08-04 00:00:01',
    'end'   => '2020-08-05 02:00:01'
);

echo json_encode($data);