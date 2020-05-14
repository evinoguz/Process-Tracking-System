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
                    <a href="/mypost/create" class="btn btn-danger"><i class="fa fa-plus"></i>
                        Yeni Post Oluştur</a>
                </div>
                <table class="table table-hover table-bordered" style="width: 100%;">
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <tr>
                                <td><h2 class="post-title">
                                        {{ucfirst($post->user->name).' > '.ucwords($post->location).'-'. ucwords($post->title)}}
                                    </h2></td>
                                <td>{{$post->status ? 'Yayında':'Yayında Değil'}}</td>
                                <td>
                                    <a href="/mypost/{{$post->id}}/edit" class="btn btn-primary eylem"
                                       data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                    <a href="/mypost/{{$post->id}}" class="btn btn-danger eylem" data-toggle="tooltip"
                                       title="Sil" data-method="delete" data-confirm="Emin misin ?"><i
                                            class="fa fa-remove"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">{!! $post->small_image !!}</td>
                            </tr>
                            <tr>
                                <td colspan="3">>
                                    {!! substr(strip_tags(ucfirst($post->content)),0,500).'...' !!}<br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right"><a class="btn-reading" href="{{route('view',$post->id)}}">Devamını Oku...</a></td>
                            </tr>
                            <tr>
                                <td colspan="3"> <p class="post-meta">{{$post->created_at->diffForHumans()}}</p></td>

                            </tr>



                        </div>
                        @endforeach</tbody>
                </table>
                <div class="text-center">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
@endsection


