@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card">
                    <div class="header">
                        <div class="header">Vouchers
                            <a href="{{url('/vouchers/create')}}" class="pull-right">Create voucher</a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Redeem code</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vouchers as $voucher)
                                <tr>
                                    <td class="text-center">{{ $voucher->id }}</td>
                                    <td>{{ $voucher->name }}</td>
                                    <td>{{ $voucher->redeem_code }}</td>
                                    <td>{{ $voucher->status }}</td>
                                    <td class="td-actions text-right">
                                        <a href="#" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs"
                                           data-original-title="View Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <a href="{{url('vouchers/'.$voucher->id.'/edit')}}" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs"
                                           data-original-title="Edit voucher">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs"
                                           data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
