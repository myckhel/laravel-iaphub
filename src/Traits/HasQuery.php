<?php
namespace Myckhel\Iaphub\Traits;

use Illuminate\Support\Facades\Http;

/**
 * Default Check Mobi Requests
 */
trait HasQuery
{
  public static function getUser($id, $params = [])
  {
    return self::get("user/$id", $params)->json();
  }

  public static function postUser($id, $params = [])
  {
    return self::post("user/$id", $params)->json();
  }

  public static function postUserPricing($id, $params = [])
  {
    return self::post("user/$id/pricing", $params)->json();
  }
  public static function postUserReceipt($id, $params = [])
  {
    return self::post("user/$id/receipt", $params)->json();
  }
  public static function postUserPurchases($id, $params = [])
  {
    return self::get("user/$id/purchases", $params)->json();
  }
  public static function getPurchase($id, $params = [])
  {
    return self::get("purchase/$id", $params)->json();
  }
  public static function getReceipt($id, $params = [])
  {
    return self::get("receipt/$id", $params)->json();
  }
}
