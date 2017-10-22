<?php

if (!function_exists('getCurrencyDropdown')) {

  /**
   * Generates a dropdown with currency lists.
   *
   * @return string
   */

  function getCurrencyDropdown($choosen_currency = null)
  {
    $xml = simplexml_load_file(app_path('Support/xml/currency_list.xml'));

    foreach ($xml->CcyTbl->CcyNtry as $country) {
      if (!isset($usedCurrencies[(string)$country->Ccy]) && $country->CcyNm != 'No universal currency') {
        $currencies[(string)$country->Ccy] = (string) $country->CcyNbr;
        $usedCurrencies[(string)$country->Ccy] = $country->Ccy;
      }
    }
    ksort($currencies);
    unset($usedCurrencies);
    unset($xml);

    $currencylist = '<select id="currency" name="currency" class="form-control" required>';
    foreach ($currencies as $currency => $currency_number) {

        $currencylist .= '<option value="' . $currency_number . '" '.($choosen_currency == $currency_number ? 'selected' : '') .'>' . $currency . '</option>';
    }
    $currencylist .= '</select>';
    return $currencylist;
  }
}

/**
 * Generates a dropdown with the users campaigns
 *
 * @return string
 */
if (!function_exists('getCampaignDropdown')){
  function getCampaignDropdown($campaignId = null){
    $user = Auth::user();

    $campaigns = $user->campaigns;

    $campaignslist = '<select name="voucher_campaign_id" id="voucher_campaign_id" class="form-control">';
    foreach($campaigns as $campaign){
      $campaignslist .= '<option value="'.$campaign->id.'" '.($campaignId == $campaign->id ? 'selected' : '') .'>'.$campaign->name.'</option>';
    }
    $campaignslist .= '</select>';

    return $campaignslist;
  }
}