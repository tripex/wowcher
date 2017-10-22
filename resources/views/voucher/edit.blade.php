@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">Register</div>
                <div class="content">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{ url('vouchers/'.$voucher->id) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{$voucher->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div id="redeem_code_group"
                             class="form-group{{ $errors->has('redeem_code') ? ' has-error' : '' }}">
                            <label for="redeem_code" class="col-md-4 control-label">Code</label>
                            <div class="col-md-6">
                                <input id="redeem_code" type="text" class="form-control" name="redeem_code"
                                       value="{{$voucher->redeem_code}}" required>
                                @if ($errors->has('redeem_code'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('redeem_code') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                            <label for="campaign" class="col-md-4 control-label">Campaign</label>

                            <div class="col-md-6">
                                {!! getCampaignDropdown($voucher->voucher_campaign_id) !!}
                                @if ($errors->has('campaign_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campaign_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <select id="type" name="type" class="form-control" required>
                                    <option value="fixed" {{ ($voucher->type == "fixed" ? 'selected' : '') }}>Fixed
                                    </option>
                                    <option value="percentage" {{ ($voucher->type == "percentage" ? 'selected' : '') }}>
                                        Percentage
                                    </option>
                                </select>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Start date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="datetime" class="form-control"
                                       name="start_date" value="{{$voucher->start_date}}">

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            <label for="end_date" class="col-md-4 control-label">End date</label>

                            <div class="col-md-6">
                                <input id="end_date" type="datetime" class="form-control"
                                       name="end_date" value="{{$voucher->end_date}}">

                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('end_date') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="active" {{ ($voucher->status == "active" ? 'selected' : '') }}>
                                        Active
                                    </option>
                                    <option value="paused" {{ ($voucher->status == "paused" ? 'selected' : '') }}>
                                        Paused
                                    </option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('max_usages') ? ' has-error' : '' }}">
                            <label for="max_usages" class="col-md-4 control-label">Max usages</label>

                            <div class="col-md-6">
                                <input id="max_usages" type="text" class="form-control"
                                       name="max_usages" value="{{$voucher->max_usages}}">

                                @if ($errors->has('max_usages'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('max_usages') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Currency</label>

                            <div class="col-md-6">
                                {!! getCurrencyDropdown($voucher->currency) !!}
                                @if ($errors->has('currency'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('currency') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                            <label for="discount" class="col-md-4 control-label">Discount</label>

                            <div class="col-md-6">
                                <input id="discount" type="text" class="form-control"
                                       name="discount" value="{{$voucher->discount}}" required>

                                @if ($errors->has('discount'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('discount') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Voucher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_footer')
    <script type="application/javascript">
        $('document').ready(function () {
            $('#auto_code').change(function () {
                if ($(this).is(':checked')) {
                    $('#redeem_code_group').hide();
                    $('#redeem_code').attr('disabled', 'disabled');
                    $('#voucher_qty_group').show();
                    $('#voucher_qty').attr('disabled', false);
                }
                else {
                    $('#redeem_code_group').show();
                    $('#redeem_code').attr('disabled', false);
                    $('#voucher_qty_group').hide();
                    $('#voucher_qty').attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
