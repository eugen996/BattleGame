<?php

namespace App\Characters;

class EnemyCharacter extends CharacterTemplate implements CharacterInterface
{
    /**
     * Wild Beast's attack action
     */
    public function AttackAction(CharacterTemplate $defender)
    {
        /**
         * If the hero is lucky, the wild beast can miss their hit
         */
        if($defender->MissHit())
        {
            echo $this->GetName()." miss their hit.".PHP_EOL.PHP_EOL;
        }
        else
        {
            $damage = $this->GetStats("Strength") - $defender->GetStats("Defence");

            echo $this->GetName() . "'s attacks with damage " . $damage . PHP_EOL;

            $defender->DefendAction($damage);
        }
    }

    /**
     * Wild Beast's defend action
     */
    public function DefendAction(int $damage)
    {
        $health = $this->GetHealth() - $damage;
        $this->SetHealth($health);

        if($health > 0)
            echo $this->GetName()."'s health is down to ".$health.PHP_EOL.PHP_EOL;
        else
            echo $this->GetName()." is dead.".PHP_EOL.PHP_EOL;
    }
}