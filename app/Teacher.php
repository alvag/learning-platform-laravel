<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Teacher
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $title
 * @property string|null $biography
 * @property string|null $website_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Teacher newModelQuery()
 * @method static Builder|Teacher newQuery()
 * @method static Builder|Teacher query()
 * @method static Builder|Teacher whereBiography($value)
 * @method static Builder|Teacher whereCreatedAt($value)
 * @method static Builder|Teacher whereId($value)
 * @method static Builder|Teacher whereTitle($value)
 * @method static Builder|Teacher whereUpdatedAt($value)
 * @method static Builder|Teacher whereUserId($value)
 * @method static Builder|Teacher whereWebsiteUrl($value)
 * @mixin Eloquent
 */
class Teacher extends Model
{
    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
