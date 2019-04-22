<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Level
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Level newModelQuery()
 * @method static Builder|Level newQuery()
 * @method static Builder|Level query()
 * @method static Builder|Level whereCreatedAt($value)
 * @method static Builder|Level whereDescription($value)
 * @method static Builder|Level whereId($value)
 * @method static Builder|Level whereName($value)
 * @method static Builder|Level whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Level extends Model
{
    public function course() {
        return $this->hasOne(Course::class);
    }
}
