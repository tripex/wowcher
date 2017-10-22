<?php

namespace App\Http\Controllers\Api\V1;

use App\ApiRequest;
use App\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class VoucherApiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function redeem(Request $request, $voucherCode)
  {
    $originalAmount = $request->amount;
    $orderId = $request->orderId;
    $transactionId = $request->transactionId;
    $media = $request->media;
    $mediaCampaign = $request->mediaCampaign;
    $mediaKeyword = $request->mediaKeyword;

    $user = \Auth::guard('api')->user();

    $voucher = Voucher::where([
      ['redeem_code', '=', $voucherCode],
      ['user_id', '=', $user->id],
      ['status', '=', 'active'],
      ['start_date', '<=', Carbon::now()->toDateTimeString()],
      ['end_date', '>=', Carbon::now()->toDateTimeString()],
    ])->first();

    switch ($voucher->type) {
      case 'fixed':
        if ($voucher->discount < $originalAmount) {
          $newAmount = $originalAmount - $voucher->discount;
          $discount = $voucher->discount;
        } else {
          $newAmount = 0;
          $discount = $originalAmount;
        }
        break;

      case 'percentage':
        if ($voucher->discount < 100) {
          $newAmount = $originalAmount - ($originalAmount * ($voucher->discount / 100));
          $discount = $voucher->discount;
        } else {
          $newAmount = 0;
          $discount = $originalAmount;
        }
        break;

      case 'giftcard':
        if ($voucher->discount < $originalAmount) {
          $newAmount = $originalAmount - $voucher->discount;
          $discount = $voucher->discount;
        } else {
          $newAmount = 0;
          $discount = $originalAmount;
        }
        break;

      default:
        $newAmount = 'not found';
        break;
    }

    $apiRequest = new ApiRequest();

    $apiRequest->user_id = $user->id;
    $apiRequest->voucher_id = $voucher->id;
    $apiRequest->voucher_campaign_id = $voucher->voucher_campaign_id;
    $apiRequest->original_amount = $originalAmount;
    $apiRequest->new_amount = $newAmount;
    $apiRequest->order_id = $orderId;
    $apiRequest->transaction_id = $transactionId;
    $apiRequest->media = $media;
    $apiRequest->media_campaign = $mediaCampaign;
    $apiRequest->media_keyword = $mediaKeyword;
    $apiRequest->status = 'redeem_started';

    $apiRequest->save();

    $result = array(
      'originalAmount' => $originalAmount,
      'newAmount' => $newAmount,
      'discountAmount' => $discount,
      'amountLeft' => $voucher->discount,
      'type' => $voucher->type,
      'requestId' => $apiRequest->id,
    );

    return response()->json($result);
  }
}
