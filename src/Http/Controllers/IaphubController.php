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
}
