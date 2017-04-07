<?php

use Denour\ErrorHandler\Errors;
use Denour\ErrorHandler\ErrorHandler;

require 'vendor/autoload.php';

$error = new ErrorHandler(Errors::class);
$error->add(Errors::INVALID_REQUEST);

echo $error;