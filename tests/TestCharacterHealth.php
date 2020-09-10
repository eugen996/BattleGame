<?php

use PHPUnit\Framework\TestCase;
use App\Characters\MainCharacter;

class TestCharacterHealth extends TestCase
{
    public $character;

    protected function setUp() : void
    {
        parent::setUp();
        $this->character = new MainCharacter();
    }


    public function testGetHealth()
    {
        $this->character->SetName('TestCharacter');
        $expected = 'TestCharacter';
        $actual = $this->character->GetName();

        $this->assertEquals($expected, $actual);
    }
}