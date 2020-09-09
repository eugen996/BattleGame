<?php

namespace App\Characters;

use App\Game\GameplayConfig;

class CharacterTemplate
{
    private $charName;
    private $charStats = [];

    public function SetName(string $charName)
    {
        $this->charName = $charName;
    }

    public function GetName()
    {
        return $this->charName;
    }

    public function SetStats(array $charStats)
    {
        foreach ($charStats as $key=>$value)
            $this->charStats[$key] = rand($value[0], $value[1]);
    }

    public function GetStats(string $key)
    {
        return $this->charStats[$key];
    }

    public function GetHealth()
    {
        return $this->charStats["Health"];
    }

    public function SetHealth(int $health)
    {
        $this->charStats["Health"] = $health;
    }

    /**
     * If the character is lucky the attacker can miss their hit.
     * Return true if the attacker miss their hit
     */
    public function MissHit()
    {
        if(mt_rand(0, 100) < $this->charStats["Luck"])
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}