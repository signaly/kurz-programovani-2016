<?php

class EditUserPresenter extends BasePresenter
{
	/** @var \Nextras\Dbal\Connection @inject */
	public $connection;

	/** @var \Nextras\Dbal\Result\Row */
	private $member;


	public function actionDefault(int $userId)
	{
		$user = $this->connection->query('SELECT * FROM users WHERE id = %i', $userId)->fetch();
		if ($user === null) {
			$this->error();
		}

		$this->member = $user;
	}


	protected function createComponentForm()
	{
		$form = new \Nette\Application\UI\Form();
		$form->addProtection();

		$form->addText('username', 'Uživatelské jméno')
			->setRequired();
		$form->addPassword('password', 'Heslo');
		$form->addPassword('password_repeat', 'Heslo znovu')
			->addRule(\Nette\Application\UI\Form::EQUAL, 'Hesla nejsou stejná', $form['password'])
			->setRequired(false);

		$form->addText('email', 'E-mail')
			->setType('email')
			->setRequired();
		$form->addSubmit('submit', 'Změnit');

		$form->onSuccess[] = [$this, 'processForm'];

		$form->setDefaults([
			'username' => $this->member->username,
			'email' => $this->member->email,
		]);

		$form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
		return $form;
	}


	public function processForm(\Nette\Application\UI\Form $form, $values)
	{
		$data = [
			'username' => $values->username,
			'email' => $values->email,
		];

		if (!empty($values->password)) {
			$data['password'] = $values->password;
		}

		$this->connection->query('
			UPDATE users SET %set WHERE id = %i
		', $data, $this->member->id);

		$this->redirect('UsersList:default');
	}
}
