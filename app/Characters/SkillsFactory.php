<?php

/**
 * Created by PhpStorm.
 * User: Eugen Popa
 */

namespace App\Characters;

class SkillsFactory
{
    public static function Create(string $skillName, string $skillType)
    {
        return new CharacterSkill($skillName, $skillType);
    }
}