<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Review
 *
 * @property int $id
 * @property float $rating
 * @property string|null $comment
 * @property int $course_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Review newModelQuery()
 * @method static Builder|Review newQuery()
 * @method static Builder|Review query()
 * @method static Builder|Review whereComment($value)
 * @method static Builder|Review whereCourseId($value)
 * @method static Builder|Review whereCreatedAt($value)
 * @method static Builder|Review whereId($value)
 * @method static Builder|Review whereRating($value)
 * @method static Builder|Review whereUpdatedAt($value)
 * @method static Builder|Review whereUserId($value)
 * @mixin Eloquent
 */
class Review extends Model
{
    protected $fillable = ['course_id', 'user_id', 'rating', 'comment'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
