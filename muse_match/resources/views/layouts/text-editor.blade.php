<!DOCTYPE html>
<html lang="ja">
<head>
   @include('components.head')
</head>
<body>
  
    @section('header')
        @include('components.user-header')
    @show

    @section('content')
    <main>
     <div class="form-area">
      <form action="@yield('action')" method="post">
        @csrf
          <table>
              @yield('form')
          </table>
          <input class="sent" type="submit" name="add" value="@yield('submit')">
      </form>
     </div>
    </main>
    @show

    @include('components.user-footer')
</body>
</html>