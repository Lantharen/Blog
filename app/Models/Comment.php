<?php

namespace App\Models;

use App\Orchid\Filters\RelationArticleFilter;
use App\Orchid\Filters\RelationUserNameFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Comment extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'article_id',
        'user_id',
        'content',
        'edited_at'
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected array $allowedFilters = [
        // Relational filters
        'name' => RelationUserNameFilter::class,
        'title' => RelationArticleFilter::class,
    ];

    /**
     * Relationship to Article model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * Relationship to User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
