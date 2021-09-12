<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.head')
</head>
<body>
    @include('components.user-header')
    
    <div class="posts-area">
       <div class="post-item">
          <div class="post-user-id">
              <h2><a href="https://muse.hitomisiri-riara.com/user-page/{{$post->person_id}}">{{$post->person_name}}</a></h2>
          </div>
          <div class="post-title">
              <h3><span>タイトル： </span>{{$post->title}}</h3>
          </div>
          <div class="post-parts">
              <p class="parts-title">・開催場所</p>
              <p>{{$post->venue}}</p>
          </div>
          <div class="start-datetime">
              <p class="parts-title">・開催日時</p>
              <p>{{$post->start_date}} {{$post->start_time}}</p>
          </div>
          <div class="post-content">
              <p>{{$post->content}}</p>
              <p class="updated-at">{{$post->updated_at}}</p>
          </div>
        
        @if ($url != 'https://muse.hitomisiri-riara.com/new-posts')
          <div class="fav-area">
            <form action= "https://muse.hitomisiri-riara.com/post-single-{{$post->id}}" method="post">
              @csrf
                <input type="hidden" name="fav_count" value="{{$fav->fav_count}}">
                <input class="fav-btn" type="image" src="../public/storage/ハートのマーク.png" alt="{{$fav->fav_count}}">
            </form>
            <p>{{$fav->fav_count}}</p>

          </div>
        @endif
      </div>
      
   </div>

    @include('components.user-footer')
</body>
</html>