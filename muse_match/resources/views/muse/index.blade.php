<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
    @php

          if ($url == "https://muse.hitomisiri-riara.com") {
              $single_url = "https://muse.hitomisiri-riara.com/noUser/post-single-";
              $posts_url = "https://muse.hitomisiri-riara.com";
          } else {
              $single_url = "https://muse.hitomisiri-riara.com/post-single-";
              $posts_url = "https://muse.hitomisiri-riara.com/posts";
          }
    @endphp
</head>
<body>
   
    @include('components.user-header')
    
   <main>
    <div class="posts-area">
    @foreach ($posts as $post)
      <a href="{{$single_url}}{{$post->id}}">
        <div class="post-item">
            <div class="post-parts">
                <div class="parts-title">
                    <p>・ID</p>
                </div>
                <div class="parts-content">
                    <h2>{{$post->person_name}}</h2>
                </div>
            </div>
            <div class="post-title">
                <div class="parts-title">
                    <p>タイトル： </p>
                </div>
                <div class="parts-content">
                    {{$post->title}}
                </div>
            </div>
            <div class="post-parts">
                <div class="parts-title">
                    <p class="parts-title">・開催場所</p>
                </div>
                <div class="parts-content">
                    <p>{{$post->venue}}</p>
                </div>
            </div>
            <div class="post-parts">
                <div class="parts-title">
                    <p class="parts-title">・開催日時</p>
                </div>
                <div class="parts-content">
                    <p>{{$post->start_date}}{{$post->start_time}}</p>
                </div>
            </div>
            <div class="fav-area">
                <form action= "{{$posts_url}}/up" method="post">
                    @csrf
                      <input type="hidden" name="id" value="{{$post->id}}">
                      <input type="hidden" name="url" value="{{$posts_url}}">
                      <input class="fav-type-btn" type="submit" value="いいね" alt="{{$post->fav_count}}">
                  </form>
                  <div class="fav-btn"> 
                      <p>{{$post->fav_count}}</p>
                  </div>
            </div>
        </div>
      </a>
    @endforeach
    </div>
   </main>
    @include('components.user-footer')
</body>
</html>