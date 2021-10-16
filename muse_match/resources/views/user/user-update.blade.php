@extends('layouts.users')

@section('header')
    @include('components.user-header')
@endsection

@section('form')
  <main id="edit">
    <div class="form-area">
      <form action="https://muse.hitomisiri-riara.com/user-update-top" method="post">
        @csrf
        <table>

          @error('id')
              <tr>
                <td class="error-message">{{$message}}</td>
              </tr>
          @enderror
          <tr>
            <th>ユーザーID: </th>
            <td><input id="id-form" type="text" name="id" value="{{$session->id}}"></td>
          </tr>

          @error('mail')
              <tr>
                <td class="error-message">{{$message}}</td>
              </tr>
          @enderror
          <tr>
            <th>メールアドレス: </th>
            <td><input id="email-form" type="text" name="mail" value="{{$session->mail}}"></td>
          </tr>

          @error('name')
              <tr>
                <td class="error-message">{{$message}}</td>
              </tr>
          @enderror
          <tr>
              <th>名前</th>
              <td><input id="name-form" type="text" name="name" value="{{$session->name}}"></td>
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