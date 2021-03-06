@extends('layouts.text-editor')

@section('header')
    @parent
@endsection

@section('content')
    @parent
    @section('action', "https://muse.hitomisiri-riara.com/new-posts")
    @section('form')

        @error('title')
            <tr>
                <td class="error-message">{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>投稿タイトル: </th>
            <td><input class="post-form-area" type="text" name="title"></td>
        </tr>

        @error('venue')
           <tr>
               <td class="error-message">{{$message}}</td>
           </tr> 
        @enderror
        <tr>
            <th>開催場所: </th>
            <td><input class="post-form-area" type="text" name="venue"></td>
        </tr>
        <tr>
            <th>開催日時: </th>
            <td><input class="post-form-area" type="date" name="start_date"><input class="post-form-area" type="time" name="start_time"></td>
        </tr>

        @error('content')
           <tr>
               <td class="error-message">{{$message}}</td>
           </tr> 
        @enderror
        <tr>
            <th>投稿文: </th>
            <td><textarea class="post-form-textarea" name="content" id="" cols="30" rows="10"></textarea></td>
        </tr>
    @endsection
    @section('submit', '投稿')
@endsection

@section('footer')
    @parent
@endsection