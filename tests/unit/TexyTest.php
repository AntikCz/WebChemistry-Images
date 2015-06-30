<?php


class TexyTest extends \Codeception\TestCase\Test {
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	/** @var \Texy */
	protected $texy;

	protected function _before() {
		$texy = new \Texy;

		$this->texy = $texy;

		Environment::copy('/test.png', array(
			'original',
			'image.png' => 'namespace/200x100_8'
		), '/assets');
		\WebChemistry\Images\Texy::register($texy, Environment::getByType('WebChemistry\Images\Storage'), '', '/baseUri');
	}

	protected function _after() {
		Environment::cleanFrom('/assets');
	}

	// tests
	public function testTexy() {
		$content = "[img namespace/image.png, 200x100, exact]:(alt = Popis obrázku, class = img-responsive img-circle)
					[img test.png][img //test.png]";

		$result = $this->texy->process($content);

		$this->assertStringEqualsFile(Environment::getDataDir('/expected/texy.dmp'), $result);
	}

}