@extends('layouts.master')
@section('contents')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td><h4>Roles</h4></td>
                        <td><h4>Name</h4></td>
                        <td><h4>Email</h4></td>
                        <td><h4>Created At</h4></td>
                        <th><h4>Edit / Delete</h4></th>
                    </tr></thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                @foreach($user->roles as $rol)
                                    {{$rol->name}}<br>
                                @endforeach
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="/user/{{$user->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="/user/{{$user->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Delete" data-method="delete" data-confirm="Do you want too delete ? ?"><i class="fa fa-remove"></i></a>
                            </td>

                        </tr>
                    @endforeach</tbody>
                </table>
                <div class="text-center">
                    {{$users->links()}}
                </div>
            </div>
        </div>
@endsection



