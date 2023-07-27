<?php

namespace App\Cells;

class ContentTitle
{
    public function render(array $params): string
    {
        return "<h1 class='text-3xl mb-8 font-semibold'>{$params['title']}</h1>";
    }
}
