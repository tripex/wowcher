<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiRequest extends Model
{
  protected $table = 'requests';

  protected $fillable = [
    'user_id',
    'voucher_id',
    'voucher_campaign_id',
    'original_amount',
    'new_amount',
    'order_id',
    'transaction_id',
    'media',
    'media_campaign',
    'media_keyword',
    'status'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
  ];

  public function voucher(){
    return $this->belongsTo(Voucher::class);
  }
}
