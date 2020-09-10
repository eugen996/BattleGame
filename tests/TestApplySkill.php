<?php

use PHPUnit\Framework\TestCase;
use App\Characters\SkillsFactory;

class TestApplySkill extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
    }

    public function testGetHealth()
    {
        $skill = SkillsFactory::Create("Rapid Strike", "attack");
        $expected = 40;
        $actual = $skill->ApplySkill(20);

        $this->assertEquals($expected, $actual);
    }
}