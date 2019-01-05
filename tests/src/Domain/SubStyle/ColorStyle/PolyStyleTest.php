<?php

namespace LibKml\Tests\Domain\SubStyle\ColorStyle;

use LibKml\Domain\FieldType\Color;
use LibKml\Domain\FieldType\ColorMode;
use LibKml\Domain\KmlObjectVisitorInterface;
use LibKml\Domain\SubStyle\ColorStyle\PolyStyle;
use PHPUnit\Framework\TestCase;

class PolyStyleTest extends TestCase {

  /**
   * @var PolyStyle
   */
  protected $polyStyle;

  public function setUp() {
    $this->polyStyle = new PolyStyle();
  }

  public function testDefaultValues() {
    $this->assertEquals(Color::fromWhite(), $this->polyStyle->getColor());
    $this->assertEquals(ColorMode::NORMAL, $this->polyStyle->getColorMode());
    $this->assertTrue($this->polyStyle->getFill());
    $this->assertTrue($this->polyStyle->getOutline());
  }

  public function testAccept() {
    $timeStamp = new PolyStyle();

    $objectVisitor = $this->createMock(KmlObjectVisitorInterface::class);

    $objectVisitor->expects($this->once())
      ->method('visitPolyStyle')
      ->with($this->equalTo($timeStamp));

    $timeStamp->accept($objectVisitor);
  }

  public function testFillField() {
    $fill = true;

    $this->polyStyle->setFill($fill);

    $this->assertEquals($fill, $this->polyStyle->getFill());
  }

  public function testOutlineField() {
    $outline = true;

    $this->polyStyle->setOutline($outline);

    $this->assertEquals($outline, $this->polyStyle->getOutline());
  }

}
