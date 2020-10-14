<?php
namespace Myckhel\Iaphub\Traits;

use Illuminate\Support\Facades\Http;
use Myckhel\Iaphub\IaphubConfig;

/**
 *
 */
trait Request
{
  public static function cm(){
    return new IaphubConfig;
  }

  public static function post($endpoint, $params = [])
  {
    return self::request($endpoint, $params, 'post');
  }

  public static function delete($endpoint, $params = [])
  {
    return self::request($endpoint, $params, 'delete');
  }

  public static function put($endpoint, $params = [])
  {
    return self::request($endpoint, $params, 'put');
  }

  public static function get($endpoint, $params = [])
  {
    return self::request($endpoint, $params);
  }

  public static function merge($ar, $arr){
    return array_merge($ar, $arr);
  }

  public static function request($endpoint, $params, $method = 'get')
  {
    $cm       = self::cm();
    $secret   = $cm->secret;
    $env      = $cm->env;

    $res = Http::withHeaders([
      'Content-Type'  => 'application/json',
      'Authorization' => "ApiKey $secret"
    ])
    ->$method(
      $cm->url.$endpoint,
      $params + ['environment' => $env]
    );

    if ($res->failed()) {
      if ($res->status() == 404) {
        abort(404, $res->body());
      } else {
        $res->throw();
      }
    } else {
      return $res;
    }
  }
}
