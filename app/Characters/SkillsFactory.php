<?php

namespace App\Characters;

class SkillsFactory
{
    public static function Create(string $skillName, string $skillType)
    {
        return new CharacterSkill($skillName, $skillType);
    }
}