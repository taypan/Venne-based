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

use \Venne\Developer\Module\Service\IRouteService;

/**
 * @author Josef Kříž
 */
class Module extends \Venne\Developer\Module\AutoModule {


	public function getName()
	{
		return "register";
	}


	public function getDescription()
	{
		return "Make basic static welcomes.";
	}


	public function getVersion()
	{
		return "0.1";
	}


	public function setRoutes(\Nette\Application\Routers\RouteList $router, $prefix = "")
	{
		$router[] = new \Nette\Application\Routers\Route($prefix . '[<url .+>]', array(
					'module' => 'Register',
					'presenter' => 'Default',
					'action' => 'default',
					'url' => array(
						\Nette\Application\Routers\Route::VALUE => NULL,
						\Nette\Application\Routers\Route::FILTER_IN => NULL,
						\Nette\Application\Routers\Route::FILTER_OUT => NULL,
					)
			)
		);
	}


	public function setServices(\Venne\Application\Container $container)
	{
		parent::setServices($container);
		$container->services->addService("register", new Service("register", $container->doctrineContainer->entityManager, $container->hookManager));
	}


	public function setHooks(\Venne\Application\Container $container, \App\HookModule\Manager $manager)
	{
		parent::setHooks($container, $manager);
		$manager->addHook("admin\\menu", \callback($container->services->register, "hookAdminMenu"));
	}

}
