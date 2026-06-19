<?php
function initials_from_name($name)
{
    $name = trim((string)$name);
    if ($name === '') {
        return '?';
    }
    $parts = preg_split('/\s+/u', $name);
    $last = end($parts);
    return mb_strtoupper(mb_substr($last, 0, 1, 'UTF-8'), 'UTF-8');
}

function avatar_palette_color($seed)
{
    static $palette = [
        ['bg' => '#EAEEFC', 'fg' => '#3454D1'],
        ['bg' => '#E8F8EE', 'fg' => '#15803D'],
        ['bg' => '#FEF3E2', 'fg' => '#B45309'],
        ['bg' => '#F0E9FC', 'fg' => '#7C3AED'],
        ['bg' => '#E2F4F6', 'fg' => '#0E7490'],
        ['bg' => '#FCE7F3', 'fg' => '#BE185D'],
    ];
    $index = abs(crc32((string)$seed)) % count($palette);
    return $palette[$index];
}
