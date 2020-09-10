<?php

/**
 * Created by PhpStorm.
 * User: Eugen Popa
 */

namespace App\Game;

class GameplayConfig
{
    const MAIN_CHARACTER_NAME = "Orderus";

    /**
     * Associative array template
     * Key => [Minimal value, Maximum value]
     */
    const MAIN_CHARACTER_STATS = [
        "Health" => [70, 100],
        "Strength" => [70, 80],
        "Defence" => [45, 55],
        "Speed" => [40, 50],
        "Luck" => [10, 30],
    ];

    const ENEMY_CHARACTER_NAME = "Wild Beast";

    /**
     * Associative array template
     * Key => [Minimal value, Maximum value]
     */
    const ENEMY_CHARACTER_STATS = [
        "Health" => [60, 90],
        "Strength" => [60, 90],
        "Defence" => [40, 60],
        "Speed" => [40, 60],
        "Luck" => [25, 40],
    ];

    /**
     * Associative array template
     * Key => [Chance value, Skill value (0-100)]
     */
    const CHARACTER_SKILLS = [
        "Rapid Strike"  =>  [10, 100],
        "Magic Shield"  =>  [20, 50]
    ];
}