@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($campaignsWithCVouchers as $campaignsWithVoucher)
            @foreach($campaignsWithVoucher->campaigns as $campaignWithVoucher)
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">{{ $campaignWithVoucher->name }}</div>
                        <div class="content">
                            @foreach($campaignWithVoucher->vouchers as $voucher)
                                {{ $voucher->name }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
