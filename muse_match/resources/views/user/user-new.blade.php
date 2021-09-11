@extends('layouts.users')

@section('header')
   @include('components.user-header', ['link' => 'https://muse.hitomisiri-riara.com/login', 'text' => 'ログイン'])
@endsection

@section('form')
<main>
    <div class="form-area">
      <form action="https://muse.hitomisiri-riara.com/new-top" method="post">
        @csrf
        <table>
          <tr>
            <th>ユーザーID: </th>
            <td><input id="id-form" type="text" name="id"></td>
          </tr>
          <tr>
            <th>メールアドレス: </th>
            <td><input id="email-form" type="text" name="mail"></td>
          </tr>
          <tr>
            <th>パスワード: </th>
            <td><input id="pass-form" type="text" name="pass"></td>
          </tr>
          <tr>
              <th>名前</th>
              <td><input id="name-form" type="text" name="name"></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" class="btn" value="登録" name="add"></td>
          </tr>
        </table>
@endsection

@section('footer')
   @parent
@endsection