<?php

// Define a class for the game elements
class Element {
    public $name;
    public $strengths;

    public function __construct($name, $strengths) {
        $this->name = $name;
        $this->strengths = $strengths;
    }

    public function defeats($element) {
        return in_array($element->name, $this->strengths);
    }
}

// Create the game elements as objects
$elements = [
    "rock" => new Element("rock", ["scissors", "lizard"]),
    "paper" => new Element("paper", ["rock", "spock"]),
    "scissors" => new Element("scissors", ["paper", "lizard"]),
    "lizard" => new Element("lizard", ["paper", "spock"]),
    "spock" => new Element("spock", ["rock", "scissors"])
];

// User input
$guess_name = strtolower((string)readline("Pick your RPSLS choice: " . PHP_EOL));

if (!array_key_exists($guess_name, $elements)) {
    echo "Invalid input." . PHP_EOL;
    exit;
}

$guess = $elements[$guess_name];
$opponent_name = array_rand($elements);
$opponent = $elements[$opponent_name];

// win/draw/lose conditions
if ($guess->defeats($opponent)) {
    echo "The player has won using {$guess->name} against {$opponent->name}." . PHP_EOL;
} elseif ($guess->name === $opponent->name) {
    echo "The player has drawn with the computer both using {$guess->name}." . PHP_EOL;
} else {
    echo "The player has lost using {$guess->name} against {$opponent->name}." . PHP_EOL;
}
