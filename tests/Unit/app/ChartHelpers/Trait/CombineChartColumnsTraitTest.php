<?php

use PHPUnit\Framework\TestCase;
use App\ChartHelpers\Traits\CombineChartColumnsTrait;

class CombineChartColumnsTraitTest extends TestCase
{
    public function testBasicTest()
    {
		$columnSetOne = [
		    ['x', '201712', '201801'],
		    ["title1", 0, 99],
		    ["title3", 0, 100]
		];
		$columnSetTwo = [
		    ['x', '201712', '201802', '201803'],
		    ["title2", 3, 101, 56]
		];
		$combined = [
			['x', '201712', '201801', '201802', '201803'],
			["title1", 0, 99, null, null],
			["title3", 0, 100, null, null,],
			["title2", 3, null, 101, 56]
		];

		$this->assertEquals(
			self::combineChartColumns($columnSetOne, $columnSetTwo),
			$combined	
		);
    }

	use CombineChartColumnsTrait;
}
