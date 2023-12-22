<?php

class StringUtils {

  public static function secondCase($string) {
    $str_array = [""];
    for ($i = 0; $i < strlen($string); $i ++) {
      $char = $i === 1 
        ? strtoupper($string[$i]) 
        : strtolower($string[$i]);
      $str_array[$i] = $char;
    }
    return implode("", $str_array);
  }
}

class Pajamas {
  private $owner, $fit, $color;

  function setFit($fit) {
    $this -> fit = $fit;
  }

  function __construct(
    $owner = "unclaimed",
    $fit = "loose", 
    $color = "dull") {
      $this -> owner = StringUtils::secondCase($owner);
      $this -> fit = $fit;
      $this -> color = $color;
  }

  function describe() {
    $owner = $this -> owner;
    $fit = $this -> fit;
    $color = $this -> color;
    return "\nThis pajama belongs to $owner. It has a $fit fit, and the color is $color.";
  }
}

class ButtonablePajamas extends Pajamas {
  private $button_state = "unbuttoned";

  function describe() {
    return "\n". parent::describe() . " The buttons are $this->button_state.";
  }

  function toggleButtons() {
    if ($this -> button_state === "unbuttoned") {
      $this -> button_state = "buttoned";
    } else {
      $this -> button_state = "unbuttoned";
    }
  }
}

echo StringUtils::secondCase("");
$chicken_PJs = new Pajamas();
echo $chicken_PJs -> describe();
$chicken_PJs -> setFit('shrunk');
echo  $chicken_PJs -> describe();

$moose_PJs = new ButtonablePajamas("moose");
echo $moose_PJs -> describe();
$moose_PJs -> toggleButtons();
echo $moose_PJs -> describe();
