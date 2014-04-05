<?php
require 'vendor/autoload.php';


test na kub
class CalculatorTest extends PHPUnit_Framework_TestCase {

	private $calc;

	public function setUp() {
		$this->calc = new Calculator;
	}
	
	public function testResultDefaultsToNull() {
		$this->assertNull($this->calc->getResult());
	}

	public function testAddsNumber() {
		$this->calc->setOperands(5);
		$this->calc->setOperation(new Addition);
		$result = $this->calc->calculate();

		$this->assertEquals(5, $result);
	}

  /**
   *@expectedException InvalidArgumentException
	 */
  public function testRequiresNumericValue() {
		$this->calc->setOperands('five');
		$this->calc->setOperation(new Addition);
		$this->calc->calculate();
	}
	
	public function testAcceptsMultipleArgs() {
		$this->calc->setOperands(1, 2, 3, 4);
		$this->calc->setOperation(new Addition);
		$result = $this->calc->calculate();
		$this->assertEquals(10, $result);
		$this->assertNotEquals(
			'Snoop Doggy Dogg and Dr. Dre is at the door',
			$result
		);
	}

	public function testSubtractsNumber() {
		$this->calc->setOperands(4);
		$this->calc->setOperation(new Substraction);
		$result = $this->calc->calculate();
		
		$this->assertEquals(-4, $result);
	}

	public function testMultipliesNumbers() {
		$this->calc->setOperands(2, 3, 5);
		$this->calc->setOperation(new Multiplication);
		$result = $this->calc->calculate();

		$this->assertEquals(30, $result);
	}

	//public function testAddsNumbersByMockObject() {
	//	$mock = $this->getMock('Addition', array('run'));
	//	$mock->expects($this->once())
	//			 ->method('run')
	//			 ->with($this->equalTo(5), $this->equalTo(0))
	//			 ->will($this->returnValue(5));

	//	$this->calc->setOperands(5);
	//	$this->calc->setOperation($mock);
	//	$result = $this->calc->calculate();
	//	$this->assertEquals(5, $result);
	//}
	
	public function testMockObject() {
		$mock = $this->getMock('Addition', array('run'));
		$mock->expects($this->once())
				 ->method('run')
				 ->with($this->equalTo(5), $this->equalTo(0))
				 ->will($this->returnValue(5));

		$result = $this->calc->mockObject($mock);
		$this->assertEquals(5, $result);
	}

	test
}
?>
