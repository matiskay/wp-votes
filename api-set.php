<?php

/*

Cases:

up: You can vote

up + up: You can't vote more.

down: You can vote
down + down : You can't vote more.

status "ok" means that the vote can be performed.

[ "status": "ok",
  "message": "You can vote twice!"
]

Status "ok" means that the vote can be performed.
[ "status": "fail",
  "message": "You can vote twice!"
]
*/
header('Content-type: application/json');

$value = array('cool');

if (isset($_POST['id']) && isset($_POST['vote_value']) ) {
}

$json = json_encode($value);

echo $json;

