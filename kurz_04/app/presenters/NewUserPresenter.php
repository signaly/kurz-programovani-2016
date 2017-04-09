<?php

class NewUserPresenter extends BasePresenter
{
	/** @var \Nextras\Dbal\Connection @inject */
	public $connection;


	protected function createComponentForm()
	{
		$form = new \Nette\Application\UI\Form();
		$form->addProtection();

		$form->addText('username', 'Uživatelské jméno')
			->setRequired();
		$form->addPassword('password', 'Heslo');
		$form->addPassword('password_repeat', 'Heslo znovu')
			->addRule(\Nette\Application\UI\Form::EQUAL, 'Hesla nejsou stejná', $form['password'])
			->setRequired();
		$form->addText('email', 'E-mail')
			->setType('email')
			->setRequired();
		$form->addSubmit('submit', 'Přidat');

		$form->onSuccess[] = [$this, 'processForm'];

		$form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
		return $form;
	}


	public function processForm(\Nette\Application\UI\Form $form, $values)
	{
		$this->connection->query('
			INSERT INTO users %values
		', [
			'username' => $values->username,
			'password' => $values->password,
			'email' => $values->email,
		]);
		$this->redirect('UsersList:default');
	}
}
