@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="header">Register</div>
                    <div class="content">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/vouchers/store') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus>

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
                                           value="{{ old('redeem_code') }}" required>
                                    @if ($errors->has('redeem_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('redeem_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div id="voucher_qty_group"
                                 class="form-group{{ $errors->has('voucher_qty') ? ' has-error' : '' }}"
                                 style="display: none;">
                                <label for="voucher_qty" class="col-md-4 control-label">Number of vouchers</label>
                                <div class="col-md-6">
                                    <input id="voucher_qty" type="text" class="form-control" name="voucher_qty"
                                           value="{{ old('voucher_qty') }}" required disabled>
                                    @if ($errors->has('voucher_qty'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('voucher_qty') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 "></div>
                                <div class="col-md-6">
                                    <div>
                                        <label class="checkbox">
                                            <span class="icons">
                                                <span class="first-icon fa fa-square-o"></span>
                                                <span class="second-icon fa fa-check-square-o"></span>
                                            </span>
                                            <input type="checkbox" data-toggle="checkbox" value="" id="auto_code">
                                            Auto generate codes
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('campaign_id') ? ' has-error' : '' }}">
                                <label for="campaign" class="col-md-4 control-label">Campaign</label>

                                <div class="col-md-6">
                                    {!! getCampaignDropdown() !!}
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
                                        <option value="fixed">Fixed</option>
                                        <option value="percentage">Percentage</option>
                                        <option value="giftcard">Giftcard</option>
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
                                           name="start_date" required>

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
                                           name="end_date" required>

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
                                        <option value="active">Active</option>
                                        <option value="paused">Paused</option>
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
                                           name="max_usages" required>

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
                                    {!! getCurrencyDropdown() !!}
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
                                           name="discount" required>

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
                                        Create Voucher
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
