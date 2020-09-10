<?php

use PHPUnit\Framework\TestCase;
use App\Characters\MainCharacter;

class TestCharacterName extends TestCase
{
    public $character;

    protected function setUp() : void
    {
        parent::setUp();
        $this->character = new MainCharacter();
    }


    public function testGetStatus()
    {
        $this->character->SetName("Eugen");
        $expected = 'Eugen';
        $actual = $this->character->GetName();

        $this->assertEquals($expected, $actual);
    }
}