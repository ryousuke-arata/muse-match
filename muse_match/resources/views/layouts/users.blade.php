<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
</head>
<body>
    @yield('header')

    @section('form')
      <main id="edit">
        <div class="form-area">
          <form action="https://muse.hitomisiri-riara.com/login-top" method="post">
            @csrf
            <table class="profile-edit">
              @if (session('re_signal') == 'error')
                  <tr>
                    <td class="error-message">{{session('re_message')}}</td>
                  </tr>
              @endif
              
              @error('mail')
                <tr>
                  <td class="error-message">{{$message}}</td>
                </tr>
              @enderror
              <tr>
                <th>メールアドレス: </th>
                <td><input id="email-form" type="text" name="mail" value="{{old('mail')}}"></td>
              </tr>
        
              @error('pass')
                <tr>
                  <td class="error-message">{{$message}}</td>
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