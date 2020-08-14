@extends('layouts.master')
@section('contents')
     <!-- Main Content -->
    <div class="container">
        @foreach($posts as $post)
            <table style="width: 100%; ">
                <tr >
                    <td colspan="3"><h2 class="post-title">
                            {{ucfirst($post->user->name).' > '.ucwords($post->location).' - '. ucwords($post->title)}}
                        </h2></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center">{!! $post->small_image !!}</td>
                </tr>
                <tr>
                    <td colspan="3">
                        {!! substr(strip_tags(ucfirst($post->content)),0,500).'...' !!}<br>
                    </td>
                </tr>
                <tr>
                    <td><p class="post-meta">{{$post->created_at->diffForHumans()}}</p></td>
                    <td colspan="2" style="text-align: right"><a class="btn-reading" href="{{route('view',$post->id)}}">Devamını Oku...</a></td>
                </tr>
            </table>
            <br><br><br>
        @endforeach
    </div>
@stop
@section('script')
@stop
