<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
</head>
<body>
    <header>
        @include('components.user-header')
    </header>
      
    <main>
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
            <tr class="pr-table">
                <th>自己PR</th>
                <td class="pr-td">{{$user->pr}}</td>
            </tr>
        </table>
        
        @isset ($posts)
        <div class="posts-area">
            @foreach ($posts as $post)
                    <div class="post-item">
                        <div class="post-title">
                            <div class="parts-title">
                                <h3>タイトル: </h3>
                            </div>
                            <div class="parts-content">
                                <p>{{$post->title}}</p>
                            </div>
                        </div>
                        <div class="post-parts">
                            <div class="parts-title">
                                <p>・開催場所</p>
                            </div>
                            <div class="parts-content">
                                <p>{{$post->venue}}</p>
                            </div>
                        </div>
                        <div class="post-parts">
                            <div class="parts-title">
                                <p>・開催日時</p>
                            </div>
                            <div class="parts-content">
                                <p>{{$post->start_date}}{{$post->start_time}}</p>
                            </div>
                        </div>
                        <div class="post-parts">
                            <div class="parts-title">
                                <p>本文</p>
                            </div>
                            <div class="post-content">
                                <p>{{$post->content}}</p>
                            </div>
                            <div class="updated-at">
                                <p>{{$post->created_at}}</p>
                            </div>
                        </div>
                        <div class="fav-area">
                            <div class="fav-btn">
                                <p>{{$post->fav_count}}</p>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        @endisset
    </main>
    @include('components.user-footer')
</body>
</html>