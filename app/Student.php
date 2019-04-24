<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Student
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Student newModelQuery()
 * @method static Builder|Student newQuery()
 * @method static Builder|Student query()
 * @method static Builder|Student whereCreatedAt($value)
 * @method static Builder|Student whereId($value)
 * @method static Builder|Student whereTitle($value)
 * @method static Builder|Student whereUpdatedAt($value)
 * @method static Builder|Student whereUserId($value)
 * @mixin Eloquent
 */
class Student extends Model
{

    protected $fillable = [
        'user_id', 'title'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'role_id', 'name', 'email');
    }
}
