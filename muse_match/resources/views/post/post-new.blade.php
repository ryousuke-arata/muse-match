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
                <td style="color: red;">{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>投稿タイトル</th>
            <td><input class="post-form-area" type="text" name="title"></td>
        </tr>

        @error('venue')
           <tr>
               <td style="color: red;">{{$message}}</td>
           </tr> 
        @enderror
        <tr>
            <th>開催場所</th>
            <td><input class="post-form-area" type="text" name="venue"></td>
        </tr>
        <tr>
            <th>開催日時</th>
            <td><input class="post-form-area" type="date" name="start_date"></td>
            <td><input class="post-form-area" type="time" name="start_time"></td>
        </tr>

        @error('content')
           <tr>
               <td style="color: red;">{{$message}}</td>
           </tr> 
        @enderror
        <tr>
            <th>投稿文</th>
            <td><textarea class="post-form-textarea" name="content" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><input class="btn" type="submit" name="'add" value="投稿"></td>
        </tr>
    @endsection
@endsection

@section('footer')
    @parent
@endsection