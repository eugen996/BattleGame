<?php

namespace App\Game;

use App\Characters\CharacterTemplate;
use App\Characters\MainCharacter;
use App\Characters\EnemyCharacter;

class TheHeroGame
{
    /**
     * Maximum number of turns
     */
    const MAX_TURNS = 20;

    /**
     * The character who was preparing to attack
     */
    private $attacker;

    /**
     * Hero character
     */
    private $MainCharacter;
    /**
     * Wild Beast character
     */
    private $EnemyCharacter;

    /**
     * The main function of the game.
     * This function simulates the fight.
     */
    public function LoadGame()
    {
        $this->LoadMainCharacter();
        $this->LoadEnemyCharacter();

        $this->SetFirstHit();

        $turns = 1;

        echo "The game has begun. ".$this->MainCharacter->GetName()."'s health is ".$this->MainCharacter->GetHealth()." and ".$this->EnemyCharacter->GetName()."'s health is ".$this->EnemyCharacter->GetHealth().PHP_EOL;

        while($this->MainCharacter->GetHealth() > 0 && $this->EnemyCharacter->GetHealth() > 0 && $turns < self::MAX_TURNS)
        {
            echo "Turn ".$turns.PHP_EOL;

            switch ($this->attacker) {
                case "MainCharacter":
                    $this->MainCharacter->AttackAction($this->EnemyCharacter);
                    $this->attacker = "EnemyCharacter";
                    break;
                case "EnemyCharacter":
                    $this->EnemyCharacter->AttackAction($this->MainCharacter);
                    $this->attacker = "MainCharacter";
                    break;
            }

            $turns++;
        }

        if($this->MainCharacter->GetHealth() > $this->EnemyCharacter->GetHealth())
        {
            echo $this->MainCharacter->GetName()." win!";
        }
        elseif($this->MainCharacter->GetHealth() < $this->EnemyCharacter->GetHealth())
        {
            echo $this->EnemyCharacter->GetName()." win!";
        }
    }

    /**
     * This function is used to load the main character (hero)
     */
    private function LoadMainCharacter()
    {
        $this->MainCharacter = new MainCharacter();

        $this->MainCharacter->SetName(GameplayConfig::MAIN_CHARACTER_NAME);
        $this->MainCharacter->SetStats(GameplayConfig::MAIN_CHARACTER_STATS);

        $this->MainCharacter->LoadSkills();
    }

    /**
     * This function is used to load the enemy character (wild beast)
     */
    private function LoadEnemyCharacter()
    {
        $this->EnemyCharacter = new EnemyCharacter();

        $this->EnemyCharacter->SetName(GameplayConfig::ENEMY_CHARACTER_NAME);
        $this->EnemyCharacter->SetStats(GameplayConfig::ENEMY_CHARACTER_STATS);
    }

    /**
     * This function is used to determine witch character will hit firstly
     */
    private function SetFirstHit()
    {
        if($this->MainCharacter->GetStats("Speed") > $this->EnemyCharacter->GetStats("Speed"))
        {
            $this->attacker = "MainCharacter";
        }
        elseif($this->MainCharacter->GetStats("Speed") < $this->EnemyCharacter->GetStats("Speed"))
        {
            $this->attacker = "EnemyCharacter";
        }
        elseif($this->MainCharacter->GetStats("Luck") > $this->EnemyCharacter->GetStats("Luck"))
        {
            $this->attacker = "MainCharacter";
        }
        elseif($this->MainCharacter->GetStats("Luck") < $this->EnemyCharacter->GetStats("Luck"))
        {
            $this->attacker = "EnemyCharacter";
        }
        else
        {
            $this->attacker = "MainCharacter";
        }
    }
}