<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
    @php

          if ($url == "http://localhost:81/muse_match/public") {
              $single_url = "http://localhost:81/muse_match/public/noUser/post-single-";
              $posts_url = "http://localhost:81/muse_match/public";
          } else {
              $single_url = "http://localhost:81/muse_match/public/post-single-";
              $posts_url = "http://localhost:81/muse_match/public/posts";
          }
    @endphp
</head>
<body>
   
    @include('components.user-header')
    
    
    <div class="posts-area">
    @foreach ($posts as $post)
      <a href="{{$single_url}}{{$post->id}}">
       <form method="post">
           @csrf
           <input type="hidden" name="fav_count" value="{{$post->fav_count}}">
        <div class="post-item">
            <div class="post-user-id">
                <h2>{{$post->person_name}}</h2>
            </div>
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
            <a href="{{$posts_url}}">
               <div class="fav-area">
                   <img src="../public/storage/ハートのマーク.png" alt="いいねの数">
                   <p>{{$post->fav_count}}</p>
               </div>
            </a>
        </div>
       </form>
      </a>
    @endforeach
    </div>

    @include('components.user-footer')
</body>
</html>