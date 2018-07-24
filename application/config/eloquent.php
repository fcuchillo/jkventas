<?php
require BASEPATH.'../vendor/autoload.php';
/* Eloquent ORM Configuration */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $db['jkventas']['hostname'],
    'database'  => $db['jkventas']['database'],
    'username'  => $db['jkventas']['username'],
    'password'  => $db['jkventas']['password'],
    'charset'   => $db['jkventas']['char_set'],
    'collation' => $db['jkventas']['dbcollat'],
    'prefix'    => $db['jkventas']['dbprefix']
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();