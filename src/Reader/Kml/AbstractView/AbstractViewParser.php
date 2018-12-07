<?php

namespace LibKml\Reader\Kml\AbstractView;

use LibKml\Domain\KmlObject;
use LibKml\Reader\Kml\KmlObjectParser;
use SimpleXMLElement;

abstract class AbstractViewParser extends KmlObjectParser {

  protected function loadValues(KmlObject &$kmlObject, SimpleXMLElement $element): void {
    parent::loadValues($kmlObject, $element);

    if (isset($element->longitude)) {
      $kmlObject->setLongitude(floatval($element->longitude));
    }

    if (isset($element->latitude)) {
      $kmlObject->setLatitude(floatval($element->latitude));
    }

    if (isset($element->altitude)) {
      $kmlObject->setAltitude(floatval($element->altitude));
    }

    if (isset($element->heading)) {
      $kmlObject->setHeading(floatval($element->heading));
    }

    if (isset($element->tilt)) {
      $kmlObject->setTilt(floatval($element->tilt));
    }
  }

}