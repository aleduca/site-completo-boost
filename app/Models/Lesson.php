<?php

namespace App\Models;

use Database\Factories\LessonFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    /** @use HasFactory<LessonFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'course_id',
        'title',
        'slug',
        'video_url',
        'description',
    ];

    /**
     * Get the category that owns the lesson.
     *
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the course that owns the lesson.
     *
     * @return BelongsTo<Course, $this>
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Scope a query to search lessons by title or category and filter by category slug.
     *
     * @param  Builder<Lesson>  $query
     * @return Builder<Lesson>
     */
    public function scopeFilter(Builder $query, string $search = '', string $category = ''): Builder
    {
        return $query
            ->when($search !== '', function (Builder $q) use ($search): void {
                $q->where(function (Builder $subQuery) use ($search): void {
                    $subQuery->where('title', 'like', "%{$search}%")
                        ->orWhereHas('category', function (Builder $categoryQuery) use ($search): void {
                            $categoryQuery->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->when($category !== '', function (Builder $q) use ($category): void {
                $q->whereHas('category', function (Builder $categoryQuery) use ($category): void {
                    $categoryQuery->where('slug', $category);
                });
            });
    }
}
