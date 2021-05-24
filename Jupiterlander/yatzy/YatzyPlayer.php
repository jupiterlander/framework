<?php

namespace Jupiterlander\yatzy;

use Jupiterlander\dice\DiceHand as DiceHand;
use Jupiterlander\yatzy\ScoreBoard;

class YatzyPlayer
{
    const WAITING = 'waiting';

    /**
     * Properties
     */
    private $diceHand = null;
    private $rolls = null;
    private $scoreboard = null;
    private $name = null;



    /**
     * Constructor
     */
    public function __construct(int $dices = 5, int $faces = 6, int $rolls = 0)
    {
        $this->diceHand = new DiceHand($dices, $faces);
        $this->rolls = $rolls;
        $this->scoreboard = new ScoreBoard();
    }


  /**
     * Roll dice/dices in hand and update $rolls
     *
     * @return array
     */
    public function rollHand(array $diceToRoll = null): array
    {
        $this->diceHand->rollHand($diceToRoll);
        $this->rolls++;
        //$this->rolls = array_merge($this->rolls, $this->diceHand->getHandValues());

        return $this->diceHand->getHandValues();
    }


    /**
     * Get the value of rolls
     */
    public function getRolls(): int
    {
        return $this->rolls;
    }


    /**
     * Get properties
     */
    public function getDiceHand()
    {
        return $this->diceHand->getHandValues();
    }

    /**
     * Get the value of scoreboard
     */
    public function getScoreboard()
    {
        return $this->scoreboard;
    }

    /**
     * Set the value of scoreboard
     *
     * @return  self
     */
    public function setScoreboard(string $key)
    {
        $dieValue = $this->scoreboard->toDieValue($key);
        $total = 0;
        $score = $this->diceHand->getHandValues();

        foreach ($score as $value) {
            $total += ($dieValue == $value) ? $value : 0;
        }

        $this->scoreboard->setScore($key, $total);

        return $this;
    }

    /**
     * Set the value of rolls
     *
     * @return  self
     */
    public function setRolls($rolls)
    {
        $this->rolls = $rolls;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
