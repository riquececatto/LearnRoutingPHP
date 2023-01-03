<?php

// require_once ROOT. '/vendor/autoload.php';

// Create a cuid instance
// $cuid = new EndyJasmi\Cuid;

// Generate normal cuid
// $normalCuid = $cuid->cuid(); // ci27flk5w0002adx5dhyvzye2

// Generate short cuid
// $shortCuid = $cuid->slug(); // 6503a5k0

// You can also generate cuid using static method
// $normalCuid = EndyJasmi\Cuid::cuid();
// $shortCuid = EndyJasmi\Cuid::slug();

// There is also an alias method for better readability
// $normalCuid = EndyJasmi\Cuid::make();

function cuid() {
    $cuid = new EndyJasmi\Cuid;
    return $cuid->cuid();
}
