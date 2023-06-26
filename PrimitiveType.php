<?php
declare(strict_types=1);
require_once 'Songs.php';
$song=new Songs("Minahil",123);
print $song->getName().PHP_EOL;
print $song->getNumberOfPlays().PHP_EOL;

?>