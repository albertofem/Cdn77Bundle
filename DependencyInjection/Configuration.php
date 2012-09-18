<?php

/*
 * This file is part of Cdn77Bundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\Cdn77Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('cdn77', 'array');

		$rootNode
			->children()
				->scalarNode("login")->cannotBeEmpty()->end()
				->scalarNode("password")->cannotBeEmpty()->end()
				->arrayNode("cdns")
					->useAttributeAsKey('name')
					->defaultValue(array())
					->prototype('scalar')->end()
				->end()
			->end()
		->end();

		return $treeBuilder;
	}
}
