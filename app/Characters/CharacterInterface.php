<?php

/**
 * Created by PhpStorm.
 * User: Eugen Popa
 */

namespace App\Characters;

interface CharacterInterface
{
    public function AttackAction(CharacterTemplate $defender);
    public function DefendAction(int $damage);
}