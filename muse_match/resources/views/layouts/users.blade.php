<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
</head>
<body>
    @yield('header')

    @section('form')
      <main>
        <div class="form-area">
          <form action="http://localhost:81/muse_match/public/login-top" method="post">
            @csrf
            <table>
              @if (session('re_signal') == 'error')
                  <tr>
                    <td style="color: red;">{{session('re_message')}}</td>
                  </tr>
              @endif
              
              @error('mail')
                <tr>
                  <td style='color: red;'>{{$message}}</td>
                </tr>
              @enderror
              <tr>
                <th>メールアドレス: </th>
                <td><input id="email-form" type="text" name="mail" value="{{old('mail')}}"></td>
              </tr>
        
              @error('pass')
                <tr>
                  <td style='color: red;'>{{$message}}</td>
                </tr>
              @enderror
              <tr>
                <th>パスワード: </th>
                <td><input id="pass-form" type="text" name="pass" value="{{old('pass')}}"></td>
              </tr>

              <tr>
                <th></th>
                <td><input type="submit" class="sent" value="@yield('submit')"></td>
              </tr>
            </table>
          </form>
        </div>
      </main>
    @show

    @include('components.user-footer')
</body>
</html>