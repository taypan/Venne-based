<?php

namespace App\RegisterModule;

use Nette\Environment;
use Venne\Application\UI;
/**
 * @resource PagesModule
 */
class DefaultPresenter extends \Venne\Developer\Presenter\FrontPresenter {

	public function getModel(){
		if(isset($this->model)){
			return $this->model;
		} else {
			$this->model = New RegisterModel();
		}
	}
	
	/**
	 * @privilege read
	 */
	public function startup()
	{
		parent::startup();
	}

	public function createComponentRegisterForm($name)
	{
		$form = new \Nette\Application\UI\Form;
		$form->addText('name', 'Jméno:');
		$form->addPassword('password', 'Heslo:');
		$form->addSubmit('login', 'Přihlásit se');
		$form->onSuccess[] = callback($this, 'signInFormSubmitted');
		return $form;
	}

	public function signInFormSubmitted($form)
	{
		$values = $form->getValues();
		dump($this->presenter->context->services->register);
	}


	public function beforeRender()
	{
		parent::beforeRender();

		$this->setTitle("Registrovat");
		$this->setKeywords("keyword");
		$this->setDescription("description");
		$this->setRobots(self::ROBOTS_INDEX | self::ROBOTS_FOLLOW);
	}

}