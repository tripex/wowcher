@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">User informations</div>
                <div class="content">
                    <form method="POST" action="{{ url('users/update') }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$user->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="tel" class="form-control" name="phone"
                                           value="{{$user->phone}}">

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label for="company">Company</label>
                                    <input id="company" type="text" class="form-control" name="company"
                                           value="{{$user->company}}">

                                    @if ($errors->has('company'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('cvr') ? ' has-error' : '' }}">
                                    <label for="cvr">CVR</label>
                                    <input id="cvr" type="text" class="form-control" name="cvr"
                                           value="{{$user->cvr}}">

                                    @if ($errors->has('cvr'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cvr') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                    <label for="street">Street</label>
                                    <input id="street" type="text" class="form-control" name="street"
                                           value="{{$user->street}}">

                                    @if ($errors->has('street'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city">City</label>
                                    <input id="city" type="text" class="form-control" name="city"
                                           value="{{$user->city}}">

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    <label for="zipcode">Zipcode</label>
                                    <input id="zipcode" type="text" class="form-control" name="zipcode"
                                           value="{{$user->zipcode}}">

                                    @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pull-right">
                                <button type="submit" class="btn btn-primary">
                                    Update user informations
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">Login informations</div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <div class="class=form-control">
                                    {{$user->email}} <a data-toggle="modal" data-target="#new_email_modal">(Change
                                        e-mail)</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zipcode">Password</label>
                                <div class="class=form-control">
                                    <a data-toggle="modal" data-target="#new_password_modal">Change password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="zipcode">API-Token</label>
                                <div class="class=form-control">
                                    {{$user->api_token}} <a data-toggle="modal" data-target="#new_api_token_modal">(New API-token)</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New e-mail modal -->
    <div class="modal fade" id="new_email_modal" tabindex="-1" role="dialog" aria-labelledby="new_email_modal_label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="new_email_modal_label">Change e-mail</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('users/update-email') }}" id="form_update_email">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">New e-mail</label>
                                    <input id="email" type="text" class="form-control" name="email"
                                           value="">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('confirm_email') ? ' has-error' : '' }}">
                                    <label for="confirm_email">Confirm new e-mail</label>
                                    <input id="confirm_email" type="text" class="form-control" name="confirm_email"
                                           value="">

                                    @if ($errors->has('confirm_email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirm_email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#form_update_email').submit();">Save
                        changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- New e-mail modal end -->
    <!-- New password modal -->
    <div class="modal fade" id="new_password_modal" tabindex="-1" role="dialog"
         aria-labelledby="new_password_modal_label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="new_password_modal_label">Change e-mail</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('users/update-password') }}" id="form_update_password">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('existing_password') ? ' has-error' : '' }}">
                                    <label for="existing_password">Existing password</label>
                                    <input id="existing_password" type="password" class="form-control"
                                           name="existing_password"
                                           value="">

                                    @if ($errors->has('existing_password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('existing_password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                    <label for="new_password">New password</label>
                                    <input id="new_password" type="password" class="form-control"
                                           name="new_password"
                                           value="">

                                    @if ($errors->has('new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('confirm_new_password') ? ' has-error' : '' }}">
                                    <label for="confirm_new_password">Confirm new password</label>
                                    <input id="confirm_new_password" type="password" class="form-control"
                                           name="confirm_new_password"
                                           value="">

                                    @if ($errors->has('confirm_new_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirm_new_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#form_update_password').submit();">Save
                        changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- New password modal end -->
    <!-- New API-token modal -->
    <div class="modal fade" id="new_api_token_modal" tabindex="-1" role="dialog"
         aria-labelledby="new_api_token_modal_label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="new_api_token_modal_label">New API-token</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('users/new-api-token') }}" id="form_update_email">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control"
                                           name="password"
                                           value="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('#form_update_email').submit();">Save
                        changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- New API-token modal end -->
@endsection

@section('js_footer')
@endsection
