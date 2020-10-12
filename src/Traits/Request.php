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

  public static function post($endpoint, $params)
  {
    return self::request($endpoint, $params, 'post');
  }

  public static function delete($endpoint, $params)
  {
    return self::request($endpoint, $params, 'delete');
  }

  public static function put($endpoint, $params)
  {
    return self::request($endpoint, $params, 'put');
  }

  public static function get($endpoint, $params)
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

    $res = Http::withHeaders([
      'Content-Type'  => 'application/json',
      'Authorization' => $secret
    ])
    ->$method(
      $cm->url.$endpoint,
      $params
    );

    if ($res->failed()) {
      $res->throw();
    } else {
      return $res;
    }
  }
}
