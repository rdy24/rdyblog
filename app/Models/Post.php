<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $with = ["user", "category"];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query
                    ->where("title", "like", "%" . $search . "%")
                    ->orWhere("body", "like", "%" . $search . "%");
            });
        });

        $query->when($filters["category"] ?? false, function (
            $query,
            $category
        ) {
            return $query->whereHas("category", function ($query) use (
                $category
            ) {
                return $query->where("slug", $category);
            });
        });

        $query->when($filters["user"] ?? false, function ($query, $user) {
            return $query->whereHas("user", function ($query) use ($user) {
                return $query->where("username", $user);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
