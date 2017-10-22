<?php

namespace App\Http\Controllers;

use App\ApiRequest;
use Illuminate\Http\Request;

use Carbon\Carbon;

class StatisticsController extends Controller
{
  public function __construct()
  {
  }

  public function getRedeems($from = null, $to = null)
  {
    if ($from == null) {
      $from = Carbon::today();
    }
    if ($to == null) {
      $to = Carbon::today();
    }

    $api_requests = ApiRequest::whereDate('created_at', '>=', $from)
      ->whereDate('created_at', '<=', $to)
      ->get();

    dd($api_requests);
  }
}
