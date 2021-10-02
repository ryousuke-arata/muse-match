@extends('layouts.users')

@section('header')
   @include('components.user-header', ['link' => 'http://localhost:81/muse_match/public/login', 'text' => 'ログイン'])
@endsection

@section('form')
<main>
    <div class="form-area">
      <form action="http://localhost:81/muse_match/public/new-top" method="post">
        @csrf
        <table>
          @error('id')
              <tr>
                <td style='color: red;'>{{$message}}</td>
              </tr>
          @enderror
          @if (session('re_signal') == 'id' or session('re_signal') == 'all')
              <tr>
                <td style="color: red;">{{session('id_message')}}</td>
              </tr>
          @endif
          <tr>
            <th>ユーザーID: </th>
            <td><input id="id-form" type="text" name="id"></td>
          </tr>

          @error('mail')
            <tr>
              <td style='color: red;'>{{$message}}</td>
            </tr>
          @enderror
          @if (session('re_signal') == 'mail' or session('re_signal') == 'all')
              <tr>
                <td style="color: red;">{{session('mail_message')}}</td>
              </tr>
          @endif
          <tr>
            <th>メールアドレス: </th>
            <td><input id="email-form" type="text" name="mail"></td>
          </tr>

          @error('pass')
            <tr>
              <td style='color: red;'>{{$message}}</td>
            </tr>
          @enderror
          <tr>
            <th>パスワード: </th>
            <td><input id="pass-form" type="text" name="pass"></td>
          </tr>

          @error('name')
            <tr>
              <td style='color: red;'>{{$message}}</td>
            </tr>
          @enderror
          <tr>
              <th>名前</th>
              <td><input id="name-form" type="text" name="name"></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" class="sent" value="登録" name="add"></td>
          </tr>
        </table>
      </form>
@endsection

@include('components.user-footer')