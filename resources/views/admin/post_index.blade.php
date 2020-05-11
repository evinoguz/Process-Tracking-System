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
                <div class="m-b-40 text-center">
                    <a href="/post/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        Yeni Post Oluştur</a>
                </div>
                <table class="table table-hover table-bordered" style="width: 1200px;">
                    <thead>
                    <tr>
                        <th>Durum</th>
                        <th>Resim</th>
                        <th>Başlık</th>
                        <th>Slug</th>
                        <th>Konum</th>
                        <th>Üye Adı</th>
                        <th>Yayınlanma Tarihi</th>
                        <th>Eylem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><input type="checkbox" class="status" data-id="{{$post->id}}"
                                       data-url="/post/status_change" {{$post->status ? 'checked' : null}} ></td>
                            <td style="width: 200px">{!! $post->small_image !!}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->location}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="/post/{{$post->id}}/edit" class="btn btn-primary eylem"
                                   data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="/post/{{$post->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                   title="Sil" data-method="delete" data-confirm="Emin misin ?"><i
                                        class="fa fa-remove"></i></a>
                            </td>

                        </tr>
                    @endforeach</tbody>
                </table>
                <div class="text-center">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
@endsection


