<?php

/*
 * This file is part of cdn77-lib
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\Cdn77Bundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

use AFM\Bundle\Cdn77Bundle\DependencyInjection\Cdn77Extension;

class Cdn77ExtensionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var ContainerBuilder
	 */
	private $container;

	/**
	 * @var Cdn77Extension
	 */
	private $extension;

	public function setUp()
	{
		$this->container = new ContainerBuilder;
		$this->extension = new Cdn77Extension;
	}

	public function tearDown()
	{
		unset($this->container, $this->extension);
	}

	public function testConfigParameters()
	{
		$config = array(
			'cdn77' => array(
				'login' => 'test',
				'password' => 'test'
			)
		);

		$this->extension->load($config, $this->container);

		$this->assertTrue($this->container->hasParameter('cdn77'));
	}

	/**
 	 * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
	 */
	public function testConfigParametersEmpty()
	{
		$config = array(
			'cdn77' => array(
				'login' => '',
				'password' => ''
			)
		);

		$this->extension->load($config, $this->container);
	}
}
