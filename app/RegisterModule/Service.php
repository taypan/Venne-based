<?php

/**
 * Venne:CMS (version 2.0-dev released on $WCDATE$)
 *
 * Copyright (c) 2011 Josef Kříž pepakriz@gmail.com
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace App\RegisterModule;

use Venne;

/**
 * @author Jiří Müller
 */
class Service extends \Venne\Developer\Service\DoctrineService {

	public $entityNamespace = "\\App\\WelcomeModule\\";


	/**
	 * @return WelcomeModel 
	 */
	public function createServiceModel()
	{
		return new RegisterModel($this);
	}


	public function hookAdminMenu($menu)
	{
		$nav = new \App\NavigationModule\NavigationEntity("Welcome module");
		$nav->addKey("module", "Welcome:Admin");
		$menu[] = $nav;
	}
	
	

}