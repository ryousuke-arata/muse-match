<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
    @php
        if (strpos($url, 'noUser')) {
              $user_url = "https://muse.hitomisiri-riara.com/noUser/user-page/";
              $redirect_url = "https://muse.hitomisiri-riara.com/noUser/post-single-";
          } else {
              $user_url = "https://muse.hitomisiri-riara.com/user-page/";
              $redirect_url = "https://muse.hitomisiri-riara.com/post-single-";
          }
    @endphp
</head>
<body>
    @include('components.user-header')

    <main>
        <div class="posts-area">
            <div class="post-item">
                <div class="post-parts">
                    <div class="parts-title">
                        <p>・ID</p>
                    </div>
                    <div class="parts-content">
                        <h2><a class="single-id" href="{{$user_url}}{{$post->person_id}}">{{$post->person_name}}</a></h2>
                    </div>
                </div>
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
                
                @if ($url != 'https://muse.hitomisiri-riara.com/new-posts')
                <div class="fav-area">
                    <form action= "{{$redirect_url}}{{$post->id}}" method="post">
                    @csrf
                        <input type="hidden" name="fav_count" value="{{$post->fav_count}}">
                        <input class="fav-type-btn" type="submit" value="いいね" alt="{{$post->fav_count}}">
                    </form>
                    <div class="fav-btn">
                        <p>{{$post->fav_count}}</p>
                    </div>
                </div>
                </div>
                @endif
            </div>
        
        </div>
    </main>
    @include('components.user-footer')
</body>
</html>