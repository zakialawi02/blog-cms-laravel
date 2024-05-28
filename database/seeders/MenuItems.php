<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItems extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name' => "Home",
                'url' => "/",
                'parent_id' => null,
                'order' => 1,
                'class' => "header"
            ],
            [
                'name' => "Blog",
                'url' => "/blog",
                'parent_id' => null,
                'order' => 4,
                'class' => "header"
            ],
            [
                'name' => "About",
                'url' => "/about",
                'parent_id' => null,
                'order' => 2,
                'class' => "header"
            ],
            [
                'name' => "Contact",
                'url' => "/contact",
                'parent_id' => null,
                'order' => 3,
                'class' => "header"
            ],
            [
                'name' => "Menu 1",
                'url' => "#",
                'parent_id' => null,
                'order' => 1,
                'class' => "footer-a"
            ],
            [
                'name' => "Menu 2",
                'url' => "#",
                'parent_id' => null,
                'order' => 2,
                'class' => "footer-a"
            ],
            [
                'name' => "Menu 3",
                'url' => "#",
                'parent_id' => null,
                'order' => 3,
                'class' => "footer-a"
            ],
            [
                'name' => "Menu 4",
                'url' => "#",
                'parent_id' => null,
                'order' => 4,
                'class' => "footer-a"
            ],
            [
                'name' => "Menu 1",
                'url' => "#",
                'parent_id' => null,
                'order' => 1,
                'class' => "footer-b"
            ],
            [
                'name' => "Menu 2",
                'url' => "#",
                'parent_id' => null,
                'order' => 2,
                'class' => "footer-b"
            ],
            [
                'name' => "Menu 3",
                'url' => "#",
                'parent_id' => null,
                'order' => 3,
                'class' => "footer-b"
            ],
            [
                'name' => "Menu 4",
                'url' => "#",
                'parent_id' => null,
                'order' => 4,
                'class' => "footer-b"
            ],
        ];

        MenuItem::insert($menuItems);
    }
}
