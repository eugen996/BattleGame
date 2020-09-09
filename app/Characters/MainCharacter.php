<?php

namespace App\Characters;

class MainCharacter extends CharacterTemplate implements CharacterInterface
{
    /**
     * Character skills
     */
    private $RapidStrike;
    private $MagicShield;

    /**
     * This function is used to load character skills
     */
    public function LoadSkills()
    {
        $this->RapidStrike = SkillsFactory::Create("Rapid Strike", "attack");
        $this->MagicShield = SkillsFactory::Create("Magic Shield", "defence");
    }

    /**
     * Hero's attack action with attack skills
     */
    public function AttackAction(CharacterTemplate $defender)
    {
        /**
         * If the wild beast is lucky, the hero can miss their hit
         */
        if($defender->MissHit())
        {
            echo $this->GetName()." miss their hit.".PHP_EOL.PHP_EOL;
        }
        else
        {
            $damage = $this->GetStats("Strength") - $defender->GetStats("Defence");

            echo $this->GetName() . "'s attacks with damage " . $damage . PHP_EOL;

            /**
             * If the hero is lucky, uses a attack skill
             */
            if ($this->RapidStrike->TrySkill()) {
                $damage = $this->RapidStrike->ApplySkill($damage);
                echo "[Skill]" . $this->GetName() . " use Rapid Strike. Strike with damage: " . $damage . PHP_EOL;
            }

            $defender->DefendAction($damage);
        }
    }

    /**
     * Hero's defend action with defend skills
     */
    public function DefendAction(int $damage)
    {
        /**
         * If the hero is lucky, uses a defend skill
         */
        if($this->MagicShield->TrySkill())
        {
            $damage = $this->MagicShield->ApplySkill($damage);
            echo "[Skill]".$this->GetName()." use Magic Shield. Damage is ".$damage.PHP_EOL;
        }

        $health = $this->GetHealth() - $damage;
        $this->SetHealth($health);

        if($health > 0)
            echo $this->GetName()."'s health is down to ".$health.PHP_EOL.PHP_EOL;
        else
            echo $this->GetName()." is dead.".PHP_EOL.PHP_EOL;
    }
}