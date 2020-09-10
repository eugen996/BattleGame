<?php

/**
 * Created by PhpStorm.
 * User: Eugen Popa
 */

namespace App\Characters;

use App\Game\GameplayConfig;

class CharacterSkill
{
    protected $skillType;
    protected $skillName;
    protected $skillValue;

    public function __construct(string $skillName, string $skillType)
    {
        $this->skillName = $skillName;
        $this->skillType = $skillType;

        $this->skillChance = GameplayConfig::CHARACTER_SKILLS[$skillName][0];
        $this->skillValue = GameplayConfig::CHARACTER_SKILLS[$skillName][1];
    }

    public function TrySkill()
    {
        if(mt_rand(0, 100) < $this->skillChance)
            return true;
        else {
            return false;
        }
    }

    public function ApplySkill(int $damage)
    {
        if($this->skillType == "attack")
        {
            return $damage + $damage * $this->skillValue / 100;
        }
        elseif($this->skillType == "defence")
        {
            return $damage - $damage * $this->skillValue / 100;
        }
    }
}
