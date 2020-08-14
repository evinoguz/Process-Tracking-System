@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="/product/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        New Product Create</a>
                </div>
                <table class="table table-hover table-bordered" style="width: 1200px;">
                    <thead>
                    <tr>
                        <th style="width: 4%">No</th>
                        <th style="width: 14%">Product Name</th>
                        <th style="width: 14%">Product Content</th>
                        <th style="width: 14%">Product Price</th>
                        <th style="width: 11%">Step</th>
                        <th style="width: 12%">Sub_Step</th>
                        <th style="width: 13%">Updated At</th>
                        <th style="width: 13%">Edit / Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)

                        <tr>
                            <td style="width: 4%">{{$product->id}}</td>
                            <td style="width: 14%">
                                <a><b>{{$product->name}}</b></a>
                            </td>
                            <td style="width: 14%">
                                <a>{!! $product->content !!}</a>
                            </td>
                            <td style="width: 14%">
                                <a>{{number_format($product->price,2,',','.')}}</a>
                            </td>
                            <td style="width: 11%">
                                <a> {{$product->step->name}}</a>
                            </td>
                            <td style="width: 12%">
                                @foreach(\App\Sub_Step::where('step_id',$product->step->id)->get() as $sub_step)
                                <a>
                                   <ul>
                                       <li>
                                           {{$sub_step->name}}
                                       </li>
                                   </ul>
                                    </a>
                                @endforeach
                            </td>


                            <td style="width: 13%">
                                <small>{{$product->updated_at->diffForHumans()}}</small>
                            </td>
                            <td style="width: 10%">
                                <a href="/product/{{$product->id}}/edit" class="btn btn-primary eylem"
                                   data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="/product/{{$product->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                   title="Delete" data-method="delete" data-confirm="Would you like to delete ?"><i
                                        class="fa fa-remove"></i></a>
                            </td>
                        </tr>

                    @endforeach</tbody>
                </table>
                <div class="text-center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
@endsection


