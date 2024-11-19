<?php

namespace App\Models\Task;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string  $title
 * @property string  $description
 * @property integer $category_id
 * @property integer $status
 * @property string  $created_at
 * @property string  $updated_at
 *
 * @property Category $category {@see self::category()}
 */
class Task extends Model
{
    public const STATUS_NEW = 1;
    public const STATUS_IN_WORK = 2;
    public const STATUS_CLOSED = 3;

    protected $table = 'tasks';
    protected $fillable = ['user_id', 'title', 'description', 'category_id', 'status'];
    protected $hidden = ['created_at', 'updated_at'];
    // При создании задачи user_id (и др. числовые значения) могут прийти в виде строки "1", но API должно вернуть обратно строго число
    protected $casts = [
        'user_id' => 'int',
        'category_id' => 'int',
        'status' => 'int',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
