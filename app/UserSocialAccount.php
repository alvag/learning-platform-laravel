<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\UserSocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_uid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|UserSocialAccount newModelQuery()
 * @method static Builder|UserSocialAccount newQuery()
 * @method static Builder|UserSocialAccount query()
 * @method static Builder|UserSocialAccount whereCreatedAt($value)
 * @method static Builder|UserSocialAccount whereId($value)
 * @method static Builder|UserSocialAccount whereProvider($value)
 * @method static Builder|UserSocialAccount whereProviderUid($value)
 * @method static Builder|UserSocialAccount whereUpdatedAt($value)
 * @method static Builder|UserSocialAccount whereUserId($value)
 * @mixin Eloquent
 */
class UserSocialAccount extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
