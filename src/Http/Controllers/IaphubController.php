<?php

namespace Myckhel\Iaphub\Http\Controllers;

use Illuminate\Routing\Controller;
use Myckhel\Iaphub\Http\Requests\IaphubRequest;
use Illuminate\Http\Request;
use Iaphub;

class IaphubController extends Controller
{
  public function getUser(IaphubRequest $request, $id){
    return Iaphub::getUser($id, $request->all());
  }

  public function postUser(IaphubRequest $request, $id){
    return Iaphub::postUser($id, $request->all());
  }

  public function postUserPricing(IaphubRequest $request, $id){
    return Iaphub::postUserPricing($id, $request->all());
  }

  public function postUserReceipt(IaphubRequest $request, $id){
    return Iaphub::postUserReceipt($id, $request->all());
  }

  public function getUserPurchases(IaphubRequest $request, $id){
    return Iaphub::postUserPurchases($id, $request->all());
  }

  public function getPurchase(IaphubRequest $request, $id){
    return Iaphub::getPurchase($id, $request->all());
  }

  public function getReceipt(IaphubRequest $request, $id){
    return Iaphub::getReceipt($id, $request->all());
  }
  public function hooks(Request $request){
    $request->validate([
//       'type'    => 'required|in:purchase,refund,user_id_update,subscription_renewal,subscription_renewal_retry,subscription_grace_period_expire,subscription_product_change,subscription_replace,subscription_cancel,subscription_uncancel,subscription_expire',
//       'version' => 'required',
    ]);
    $type     = $request->type;
    $version  = $request->version;
    // return $request->data['userId'];
    if (in_array($type, ['subscription_renewal', 'purchase', 'subscription_product_change', 'subscription_replace'])) {
      $carbon = new \Carbon\Carbon;
      \App\Models\Subscription::updateOrCreate(
        ['user_id' => $request->data['userId']],
        [
          'user_id'         => $request->data['userId'],
          'purchase_id'     => $request->id,
          'product'         => $request->data['product'],
          'productSku'      => $request->data['productSku'],
          'purchaseDate'    => $carbon->parse($request->data['purchaseDate']),
          'expirationDate'  => $carbon->parse($request->data['expirationDate']),
        ]
      );
    }
    return ['status' => true];
  }
}
