<?php
class RemoteConnect
{
  public function connectToServer($serverName=null)
  {
    if($serverName==null){
      throw new Exception("¡Este no es un nombre de servidor!");
    }
    $fp = fsockopen($serverName,80);
    return ($fp) ? true : false;
  }
  public function returnSampleObject()
  {
    return $this;
  }
}
?>