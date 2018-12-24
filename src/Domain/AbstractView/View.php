<?php

namespace LibKml\Domain\AbstractView;

use LibKml\Domain\FieldType\AltitudeMode;

trait View {

  protected $longitude = 0;
  protected $latitude = 0;
  protected $altitude = 0;
  protected $heading = 0;
  protected $tilt = 0;
  protected $altitudeMode = AltitudeMode::CLAMP_TO_GROUND;

  public function getLongitude(): float {
    return $this->longitude;
  }

  public function setLongitude(float $longitude): void {
    $this->longitude = $longitude;
  }

  public function getLatitude(): float {
    return $this->latitude;
  }

  public function setLatitude(float $latitude): void {
    $this->latitude = $latitude;
  }

  public function getAltitude(): float {
    return $this->altitude;
  }

  public function setAltitude(float $altitude): void {
    $this->altitude = $altitude;
  }

  public function getHeading(): float {
    return $this->heading;
  }

  public function setHeading(float $heading): void {
    $this->heading = $heading;
  }

  public function getTilt(): float {
    return $this->tilt;
  }

  public function setTilt(float $tilt): void {
    $this->tilt = $tilt;
  }

  public function getAltitudeMode(): ?string {
    return $this->altitudeMode;
  }

  public function setAltitudeMode(?string $altitudeMode): void {
    $this->altitudeMode = $altitudeMode;
  }

}