<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\VoucherCampaign
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Voucher[] $vouchers
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherCampaign whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherCampaign whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherCampaign whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherCampaign whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\VoucherCampaign whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VoucherCampaign extends Model
{
  protected $fillable = [
    'name'
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function vouchers(){
    return $this->hasMany(Voucher::class);
  }
}
