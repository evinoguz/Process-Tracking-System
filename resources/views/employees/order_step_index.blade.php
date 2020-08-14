@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="/order/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        New Order Create</a>
                </div>
                <table class="table table-hover table-bordered" style="width: 1200px;">
                    <thead>
                    <tr>
                        <th style="width: 14%">User Name</th>
                        <th style="width: 14%">Product Name</th>
                        <th style="width: 13%">Updated At</th>
                        <th style="width: 14%">Step</th>
                        <th style="width: 5%">See More</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)

                        <tr>
                            <td style="width: 4%">{{$order->user->name}}</td>
                            <td style="width: 4%">{{$order->product->name}}</td>
                            <td style="width: 13%">
                                <small>{{$order->updated_at->diffForHumans()}}</small>
                            </td>
                            <td style="width: 14%">
                                {{($order->status)}}

                            </td>
                            <td style="width: 5%">
                                <button class="quick-view"><a href="/order_step/{{$order->id}}/edit">
                                        <i class="fa fa-eye"></i><span class="tooltipp"></span></a></button>
                            </td>
                        </tr>

                    @endforeach</tbody>
                </table>
                <div class="text-center">
                </div>
            </div>
        </div>
@endsection


