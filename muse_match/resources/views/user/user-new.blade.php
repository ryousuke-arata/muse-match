@extends('layouts.users')

@section('header')
   @include('components.user-header', ['link' => 'https://muse.hitomisiri-riara.com/login', 'text' => 'ログイン'])
@endsection

@section('form')
<main id="edit">
    <div class="form-area">
      <form action="https://muse.hitomisiri-riara.com/new-top" method="post">
        @csrf
        <table class="profile-edit">
          @error('id')
              <tr>
                <td class="error-message">{{$message}}</td>
              </tr>
          @enderror
          @if (session('re_signal') == 'id' or session('re_signal') == 'all')
              <tr>
                <td class="error-message">{{session('id_message')}}</td>
              </tr>
          @endif
          <tr>
            <th>ユーザーID: </th>
            <td><input id="id-form" type="text" name="id"></td>
          </tr>

          @error('mail')
            <tr>
              <td class="error-message">{{$message}}</td>
            </tr>
          @enderror
          @if (session('re_signal') == 'mail' or session('re_signal') == 'all')
              <tr>
                <td class="error-message">{{session('mail_message')}}</td>
              </tr>
          @endif
          <tr>
            <th>メールアドレス: </th>
            <td><input id="email-form" type="text" name="mail"></td>
          </tr>

          @error('pass')
            <tr>
              <td class="error-message">{{$message}}</td>
            </tr>
          @enderror
          <tr>
            <th>パスワード: </th>
            <td><input id="pass-form" type="text" name="pass"></td>
          </tr>

          @error('name')
            <tr>
              <td class="error-message">{{$message}}</td>
            </tr>
          @enderror
          <tr>
              <th>名前: </th>
              <td><input id="name-form" type="text" name="name"></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" class="sent" value="登録" name="add"></td>
          </tr>
        </table>
      </form>
    </div>
  </main>
@endsection