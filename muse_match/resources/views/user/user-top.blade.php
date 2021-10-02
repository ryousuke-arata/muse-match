<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
</head>
<body>
    <header>
        @include('components.user-header')
    </header>
      

    <table class="profile-table">
        <tr>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
        </tr>
        <tr>
            <td class="profile-td">{{$user->id}}</td>
            <td class="profile-td">{{$user->name}}</td>
        </tr>
    </table>
    <table class="profile-table">
        <tr>
            <th>自己PR</th>
            <td class="profile-ta">{{$user->pr}}</td>
        </tr>
    </table>
    
    @isset ($posts)
    <div class="posts-area">
        @foreach ($posts as $post)
                  <div class="post-item">
                     <div class="post-title">
                        <h3><span>タイトル： </span>{{$post->title}}</h3>
                     </div>
                     <div class="post-parts">
                        <p class="parts-title">・開催場所</p>
                        <p>{{$post->venue}}</p>
                     </div>
                     <div class="post-parts">
                        <p class="parts-title">・開催日時</p>
                        <p>{{$post->start_date}}{{$post->start_time}}</p>
                     </div>
                     <div class="post-content">
                        <p>{{$post->content}}</p>
                        <p class="updated-at">{{$post->created_at}}</p>
                     </div>
                     <div class="fav-area">
                        <img src="../public/storage/ハートのマーク.png" alt="いいねの数">
                        <p>{{$post->fav_count}}</p>
                     </div>
                  </div>
        @endforeach
    </div>
    @endisset
    <div class="follow-btn">
        <form action='https://muse.hitomisiri-riara.com/user-page/{{$user->id}}' method="post">
            @csrf
            <input type="submit" name="follow" hidden="{{$user->id}}" value="フォロー">
        </form>
    </div>

    @include('components.user-footer')
</body>
</html>