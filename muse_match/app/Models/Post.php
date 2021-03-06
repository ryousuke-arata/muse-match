<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class Post extends Model
{
    use HasFactory;

    protected $guarded = array(
        'id',
        'image',
    );

    public function person()
    {
        return $this->belongTo(Person::class);
    }

    //////////////新規投稿//////////////////
    public static function newPost($request)
    {
        $person = session()->get('login_user');
        $param = [
            'person_id' => $person->id,
            'person_name' => $person->name,
            'title' => $request->title,
            'venue' => $request->venue,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'content' => $request->content,
            'fav_count' => 0,
        ];
        $id = self::insertGetId($param);
        $data = self::where('id', $id)->first();
        return $data;
    }
    //////////////////////////////////////

    public static function favUpdate($request)
    {
        Post::where('id', $request->id)->increment('fav_count');
    }

    public static function indexFavGet($posts)
    {
        $fav_count = array();
        foreach ($posts as $post) {
            $fav = DB::table('favs')->where('post_id', $post->id)->first();
            array_push($fav_count, $fav->fav_count);
        }
        return $fav_count;
    }
    
     //////////////投稿からのユーザー情報表示//////////////////
    public static function userPageGet($person_id)
    {
        $user = Person::where('id', $person_id)->first();
        return $user;
    }

    public static function userPostsGet($person_id)
    {
        $posts = self::where('person_id', $person_id)->get();
        return $posts;
    }
    //////////////////////////////////////////////////////
}
