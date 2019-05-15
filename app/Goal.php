<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Goal
 *
 * @property int $id
 * @property string $goal
 * @property int $course_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Goal newModelQuery()
 * @method static Builder|Goal newQuery()
 * @method static Builder|Goal query()
 * @method static Builder|Goal whereCourseId($value)
 * @method static Builder|Goal whereCreatedAt($value)
 * @method static Builder|Goal whereGoal($value)
 * @method static Builder|Goal whereId($value)
 * @method static Builder|Goal whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Goal extends Model
{
    protected $fillable = ['course_id', 'goal'];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
