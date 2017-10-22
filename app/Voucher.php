<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Voucher
 *
 * @mixin \Eloquent
 * @property-read \App\User $user
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $redeem_code
 * @property string $campaign
 * @property string $type
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property integer $max_usages
 * @property integer $currency
 * @property integer $discount
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereRedeemCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereCampaign($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereEndDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereMaxUsages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereCurrency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereUpdatedAt($value)
 * @property integer $voucher_campaign_id
 * @method static \Illuminate\Database\Query\Builder|\App\Voucher whereVoucherCampaignId($value)
 */
class Voucher extends Model
{
  use SoftDeletes;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'name',
    'redeem_code',
    'voucher_campaign_id',
    'type',
    'start_date',
    'end_date',
    'status',
    'max_usages',
    'currency',
    'discount'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function request(){
    return $this->hasMany(Request::class);
  }
}
