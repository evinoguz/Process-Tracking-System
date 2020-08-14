@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="/employees_step/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        New Employees Step Create</a>
                </div>
                <table class="table table-hover table-bordered" style="width: 1200px;">
                    <thead>
                    <tr>
                        <th style="width: 14%">User Name</th>
                        <th style="width: 13%">Step Name</th>
                        <th style="width: 14%">Sub Step Name</th>
                        <th style="width: 13%">Edit / Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees_steps as $employees_step)

                        <tr>
                            <td style="width: 4%">{{$employees_step->user->name}}</td>
                            <td style="width: 13%">
                                <small>{{$employees_step->step->name}}</small>
                            </td>
                            <td style="width: 14%">
                                {{($employees_step->sub_step->name)}}

                            </td>
                            <td style="width: 10%">
                                <a href="/employees_step/{{$employees_step->id}}/edit" class="btn btn-primary eylem"
                                   data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="/employees_step/{{$employees_step->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                   title="Delete" data-method="delete" data-confirm="Would you like to delete ?"><i
                                        class="fa fa-remove"></i></a>
                            </td>

                        </tr>

                    @endforeach</tbody>
                </table>
                <div class="text-center">
                </div>
            </div>
        </div>
@endsection


