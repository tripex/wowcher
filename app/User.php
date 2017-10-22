<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Voucher[] $vouchers
 * @property integer $id
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property boolean $is_admin
 * @property string $api_token
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCompany($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereApiToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\VoucherCampaign[] $campaigns
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Voucher[] $campaignsVouchers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Giftcard[] $giftcards
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Giftcard[] $campaignsGiftcards
 */
class User extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'company',
    'cvr',
    'street',
    'city',
    'zipcode',
    'email',
    'phone',
    'password',
    'api_token'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'is_admin' => 'boolean',
  ];

  public function vouchers()
  {
    return $this->hasMany(Voucher::class);
  }

  public function campaigns()
  {
    return $this->hasMany(VoucherCampaign::class);
  }

  public function campaignsVouchers()
  {
    return $this->hasManyThrough(Voucher::class, VoucherCampaign::class);
  }
}
