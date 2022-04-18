<?php

/**
 * Php file to get databse instance
 */

use kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('../myspace-5a8f6-firebase-adminsdk-t77xw-981a4fab82.json');

$database = $factory->createDatabase();
