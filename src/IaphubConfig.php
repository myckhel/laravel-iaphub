<?php
namespace Myckhel\Iaphub;
/**
 *
 */
class IaphubConfig
{

  public function __construct()
  {
    $this->secret    = config('iaphub.api_key');

    $this->url       = "https://api.iaphub.com/v1/";
  }
}

?>
