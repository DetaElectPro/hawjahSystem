<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FeaturedCenters
 *
 * @property int $id
 * @property string $name
 * @property int $rate
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FeaturedCenters whereUserId($value)
 * @mixin \Eloquent
 */
class FeaturedCenters extends Model
{
    protected $fillable = ['name', 'rate'];
    protected $table = 'featured_centers';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
