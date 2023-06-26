
<?php

require_once 'Songs.php';
class Playlist{
  public $Songs=[];
  public function addSongs(Songs $song){
    $this->Songs[]=$song;

  }
  public function getLength():int
  {
    return count($this->Songs);
  }

}
 
 
?>

