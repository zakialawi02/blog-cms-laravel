<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'name',
        'url',
        'class',
        'order',
        'parent_id'
    ];

    public function getMenuItems($class)
    {
        $menuItems = MenuItem::where('class', $class)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('order')
            ->get();
        return $menuItems;
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }
}
