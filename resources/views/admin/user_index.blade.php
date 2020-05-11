@extends('layouts.master')
@section('contents')
    <header class="intro-header" style="background-image: url('img/indir9.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">

                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Roller</th>
                        <th>İsim</th>
                        <th>Email</th>
                        <th>Üyelik Tarihi</th>
                        <th>Eylem</th>
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
                                <a href="/user/{{$user->id}}/edit" class="btn btn-primary eylem" data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="/user/{{$user->id}}" class="btn btn-danger eylem" data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Silmek istediğine Emin misin ?"><i class="fa fa-remove"></i></a>
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



