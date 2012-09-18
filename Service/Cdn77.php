<?php

/*
 * This file is part of Cdn77Bundle
 *
 * (c) Alberto Fernández <albertofem@gmail.com>
 *
 * For the full copyright and license information, please read
 * the LICENSE file that was distributed with this source code.
 */

namespace AFM\Bundle\Cdn77Bundle\Service;

class Cdn77
{
	protected $config;

	protected $cdns = array();

	public function __construct(Array $config = array())
	{
		$this->config = $config;
	}

	public function getCdn($alias)
	{
		if(!isset($this->cdns[$alias]))
		{
			if($cdn = $this->fetchCdn($alias))
			{
				$this->cdns[$alias] = $cdn;
			}
			else
			{
				return null;
			}
		}

		return $this->cdns[$alias];
	}

	private function fetchCdn($alias)
	{
		if(!isset($this->config['cdns'][$alias]))
			return null;
	}
}
