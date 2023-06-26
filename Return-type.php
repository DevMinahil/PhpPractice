
<?php

require_once 'Songs.php';
require_once 'Playlist.php';
$playlist=new Playlist();
$song1=new Songs("Ramio weds heer",100);
//error 
// $song2="yesterday";
$song2=new Songs("hello php",40);
$playlist->addSongs($song1);
$playlist->addSongs($song2);
print count($playlist->Songs).PHP_EOL;
if ($playlist->getLength()<10)
{
    print "short Playlist...".PHP_EOL;
}

 
 
?>

