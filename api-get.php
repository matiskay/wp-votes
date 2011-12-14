<?php
header('Content-type: application/json')

if (isset($_GET['id'])) {
  echo $_GET['id'];
}
