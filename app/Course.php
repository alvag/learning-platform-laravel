<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Course
 *
 * @property int $id
 * @property string $description
 * @property string $slug
 * @property string|null $picture
 * @property string $status
 * @property mixed $previous_approved
 * @property mixed $previous_rejected
 * @property int $teacher_id
 * @property int $category_id
 * @property int $level_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property mixed reviews
 * @property mixed category
 * @property mixed students
 * @property Teacher teacher
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereCategoryId($value)
 * @method static Builder|Course whereCreatedAt($value)
 * @method static Builder|Course whereDeletedAt($value)
 * @method static Builder|Course whereDescription($value)
 * @method static Builder|Course whereId($value)
 * @method static Builder|Course whereLevelId($value)
 * @method static Builder|Course wherePicture($value)
 * @method static Builder|Course wherePreviusApproved($value)
 * @method static Builder|Course wherePreviusRejected($value)
 * @method static Builder|Course whereSlug($value)
 * @method static Builder|Course whereStatus($value)
 * @method static Builder|Course whereTeacherId($value)
 * @method static Builder|Course whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Course extends Model
{
    use SoftDeletes;

    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    protected $withCount = ['reviews', 'students'];

    public function pathAttachment()
    {
        return '/images/courses/' . $this->picture;
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class)->select('id', 'course_id', 'goal');
    }

    public function level()
    {
        return $this->belongsTo(Level::class)->select('id', 'name');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->select('id', 'user_id', 'course_id', 'rating', 'comment', 'created_at');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class)->select('id', 'course_id', 'requirement');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getCustomRatingAttribute()
    {
        return $this->reviews->avg('rating');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function relatedCourses()
    {
        return Course::with('reviews')->whereCategoryId($this->category->id)
            ->where('id', '!=', $this->id)
            ->latest()
            ->limit(6)
            ->get();
    }

}
