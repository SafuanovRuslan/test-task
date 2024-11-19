<?php

namespace App\Models\Category;

use App\Models\Task\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string  $name
 * @property string  $created_at
 * @property string  $updated_at
 *
 * @property Collection $tasks {@see self::$tasks()}
 */
class Category extends Model
{
    protected $table = 'categories';
    protected $hidden = ['created_at', 'updated_at'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'category_id', 'id');
    }
}
