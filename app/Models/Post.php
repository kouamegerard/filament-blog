<?php

namespace App\Models;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'body',
        'conclusion',
        'is_published',
        'is_featured',
        'user_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function post ( $slug ) {
        $post = Post::where("slug", $slug)->get();
        return $post[0];
    }

    public function readTime(){
        // Calculate the number of words in a post and divide by 200 to get reading time.
        $wordCount = str_word_count($this->content);
        if ($wordCount > 15){
            return ceil($wordCount/200);
        } elseif ($wordCount < 3) {
            return "Less than one minute";
        }else{
            return "$wordCount minutes";
        }
    }

    public function timeAgo(){
        Carbon::setLocale('en');
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public static function is_featured() {
        $featured = Post::take(1)->where("is_featured", 1)->orderBy("created_at", "DESC")->get();
        return $featured[0];
    }

    public function post_media() {
        $media = $this->getFirstMedia("posts");

        return $media;
    }

}
