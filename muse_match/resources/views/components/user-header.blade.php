
<header>
    <h1 class="header-logo">Muse Match</h1>
    @if ($url == 'https://muse.hitomisiri-riara.com/new' or $url == 'https://muse.hitomisiri-riara.com/login')
      <div class="container">
        <li class="user-hednav"><a href="{{$link}}">{{$text}}</a></li>
      </div>
    @else
      <div class="post-header-nav">
       <div class="container">
        <ul>
          @if (empty($session) or $session == null)
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/new">ユーザー登録</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/login">ログイン</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/index">全投稿一覧</a></li>
          @else
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/user-top">ユーザー情報</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/update">ユーザー情報編集</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/pr-update">プロフィール入力</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/post-new">募集分投稿</a></li>
             <li class="post-header-nav-item"><a href="https://muse.hitomisiri-riara.com/posts">全投稿一覧</a></li>
          @endif
        </ul>
       </div>
      </div>
    @endif
</header>