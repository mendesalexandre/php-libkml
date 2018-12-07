<?php

namespace LibKml\Tests\Reader\Kml\Feature\Overlay;

use LibKml\Domain\Feature\Overlay\GroundOverlay;
use LibKml\Domain\FieldType\AltitudeMode;
use LibKml\Domain\FieldType\Color;
use LibKml\Domain\Icon;
use LibKml\Domain\LatLonBox;
use LibKml\Reader\Kml\Feature\Overlay\GroundOverlayParser;
use PHPUnit\Framework\TestCase;

class GroundOverlayParserTest extends TestCase {

  const KML_GROUND_OVERLAY = <<< 'TAG'
<GroundOverlay>
   <name>GroundOverlay.kml</name>
   <color>7fffffff</color>
   <drawOrder>1</drawOrder>
   <Icon>
      <href>http://www.google.com/intl/en/images/logo.gif</href>
      <refreshMode>onInterval</refreshMode>
      <refreshInterval>86400</refreshInterval>
      <viewBoundScale>0.75</viewBoundScale>
   </Icon>
   <altitude>135.54</altitude>
   <altitudeMode>absolute</altitudeMode>
   <LatLonBox>
      <north>37.83234</north>
      <south>37.832122</south>
      <east>-122.373033</east>
      <west>-122.373724</west>
      <rotation>45</rotation>
   </LatLonBox>
</GroundOverlay>
TAG;

  /**
   * @var GroundOverlayParser
   */
  protected $groundOverlayParser;

  public function setUp() {
    $this->groundOverlayParser = new GroundOverlayParser();
  }

  public function testParse() {
    $element = simplexml_load_string(self::KML_GROUND_OVERLAY);

    $overlay = $this->groundOverlayParser->parse($element);

    $this->assertInstanceOf(GroundOverlay::class, $overlay);
    $this->assertEquals("GroundOverlay.kml", $overlay->getName());
    $this->assertEquals(Color::fromRGBA(0x7f, 0xff, 0xff, 1), $overlay->getColor());
    $this->assertEquals(1, $overlay->getDrawOrder());
    $this->assertInstanceOf(Icon::class, $overlay->getIcon());
    $this->assertEquals(135.54, $overlay->getAltitude());
    $this->assertEquals(AltitudeMode::ABSOLUTE, $overlay->getAltitudeMode());
    $this->assertInstanceOf(LatLonBox::class, $overlay->getLatLonBox());
  }

}