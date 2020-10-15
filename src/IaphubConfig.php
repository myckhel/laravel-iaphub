<?php
namespace Myckhel\Iaphub;
/**
 *
 */
class IaphubConfig
{

  public function __construct()
  {
    $this->secret             = config('iaphub.api_key');
    $this->app_id             = config('iaphub.app_id');
    $this->env                = config('iaphub.env');
    $this->hook_token         = config('iaphub.hook_token');
    $this->route_middleware   = config('iaphub.route_middleware');

    $this->url       = "https://api.iaphub.com/v1/app/{$this->app_id}/";
  }
}

?>
