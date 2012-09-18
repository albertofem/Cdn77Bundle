<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\Cdn77Bundle\Tests\Service;

use AFM\Bundle\Cdn77Bundle\Service\Cdn77;

class Cdn77Test extends \PHPUnit_Framework_TestCase
{
	public function testGetInvalidCdn()
	{
		$cdn77 = new Cdn77;
		$cdn = $cdn77->getCdn("non_exists");

		$this->assertNull($cdn);
	}
}
