@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="/step/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        New Step Create</a>
                    <a href="/sub_step/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        New Sub_Step Create</a>
                </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 30%">Sub_Step Name</th>
                        <th style="width: 15%">Created Date</th>
                        <th style="width: 15%">Updated Date</th>
                        <th style="width: 30%">Edit / Delete</th>
                    </tr></thead>
                    <tbody>
                    @php $i=1 @endphp
                    @php $x=1 @endphp
                    @foreach($steps as $step)
                        <tr>
                            <td style="width: 10%"><h5>{{$i}}</h5></td>
                            <td style="width: 30%">
                                <a>{{$step->name}}</a>
                            </td>
                            <td style="width: 15%">
                                <small>{{$step->created_at}}</small>
                            </td>
                            <td style="width: 15%">
                                <small>{{$step->updated_at->diffForHumans()}}</small>
                            </td>
                            <td >
                                <a href="/step/{{$step->id}}/edit" class="btn btn-primary eylem"
                                   data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="/step/{{$step->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                   title="Delete" data-method="delete" data-confirm="Would you like to delete the Sub_Step?"><i
                                        class="fa fa-remove"></i></a>
                            </td>
                        </tr>

                        @foreach(\App\Sub_Step::where('step_id',$step->id)->get() as $sub_step)
                            <tr>
                                <td style="width: 6%"><h5> {{$i}}.{{$x}}.</h5></td>
                                <td style="width: 40%">
                                    <a>{{$sub_step->name}}</a>
                                </td>
                                <td style="width: 10%">
                                    <small>{{$sub_step->created_at}}</small>
                                </td>
                                <td style="width: 10%">
                                    <small>{{$sub_step->updated_at->diffForHumans()}}</small>
                                </td>
                                <td style="width: 30%">
                                    <a href="/sub_step/{{$sub_step->id}}/edit" class="btn btn-primary eylem"
                                       data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="/sub_step/{{$sub_step->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                       title="Sil" data-method="delete" data-confirm="Would you like to delete the Sub_Step?"><i
                                            class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            @php $x=$x+1 @endphp
                            @endforeach
                            @php $i=$i+1 @endphp
                            @php $x=1 @endphp
                    @endforeach</tbody>
                </table>

            </div>
        </div>
@endsection



