<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Requirement
 *
 * @property int $id
 * @property string $requirement
 * @property int $course_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Requirement newModelQuery()
 * @method static Builder|Requirement newQuery()
 * @method static Builder|Requirement query()
 * @method static Builder|Requirement whereCourseId($value)
 * @method static Builder|Requirement whereCreatedAt($value)
 * @method static Builder|Requirement whereId($value)
 * @method static Builder|Requirement whereRequirement($value)
 * @method static Builder|Requirement whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Requirement extends Model
{
    public function course() {
        return $this->belongsTo(Course::class);
    }
}
