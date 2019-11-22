<?php

require_once 'config.inc.php';

$controller = new Controller();

try {
    $controller->process();
} catch (Exception $ex) {
    trigger_error($ex->getMessage());
    echo json_encode(array('error' => $ex->getMessage()));
}
