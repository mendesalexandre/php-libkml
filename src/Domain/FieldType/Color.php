<?php

namespace LibKml\Domain\FieldType;

class Color {

  private $red = 0;
  private $green = 0;
  private $blue = 0;
  private $alpha = 1;

  public static function fromRGBA(int $red, int $green, int $blue, float $alpha) {
    $color = new Color();

    $color->red = $red;
    $color->green = $green;
    $color->blue = $blue;
    $color->alpha = $alpha;

    return $color;
  }

  public function getRed(): int {
    return $this->red;
  }

  public function setRed(int $red): void {
    $this->red = $red;
  }

  public function getGreen(): int {
    return $this->green;
  }

  public function setGreen(int $green): void {
    $this->green = $green;
  }

  public function getBlue(): int {
    return $this->blue;
  }

  public function setBlue(int $blue): void {
    $this->blue = $blue;
  }

  public function getAlpha(): float {
    return $this->alpha;
  }

  public function setAlpha(float $alpha): void {
    $this->alpha = $alpha;
  }

}