@extends('layouts.master')
@section('contents')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
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
                <table class="table table-hover table-bordered" style="width: 1200px;">
                    <thead>
                    <tr>
                        <th>Durum</th>
                        <th>Üye Adı</th>
                        <th>Üye Email</th>
                        <th>Talep Tarihi</th>
                        <th>Eylem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taleps as $talep)
                        <tr>
                            <td><input type="checkbox" class="status" data-id="{{$talep->user->id}}"
                                       data-url="/talep/status_change" {{$talep->user->authorized('author') ? 'checked' : null}} ></td>
                            <td>{{$talep->user->name}}</td>
                            <td>{{$talep->user->email}}</td>
                            <td>{{$talep->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="/talep/{{$talep->id}}/edit" class="btn btn-primary eylem"
                                   data-toggle="modal" data-target="#explanation{{$talep->user->id}}" title="İncele"><i class="fa fa-eye"></i></a>
                                <a href="/talep/{{$talep->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                   title="Sil" data-method="delete" data-confirm="Emin misin ?"><i
                                        class="fa fa-remove"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="explanation{{$talep->user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$talep->user->name.' Yazarlık Talebi'}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {!! $talep->explanation !!}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach</tbody>
                </table>
                <div class="text-center">
                    {{$taleps->links()}}
                </div>
            </div>
        </div>
@endsection


