<?php


class NewAddressPresenter extends BasePresenter
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


	public function renderDefault()
	{
		$this->template->member = $this->member;
	}


	protected function createComponentForm()
	{
		$form = new \Nette\Application\UI\Form();
		$form->addProtection();
		$form->addTextArea('address', 'Adresa')
			->setRequired();
		$form->addSubmit('send', 'Přidat adresu');
		$form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
		$form->onSuccess[] = [$this, 'processForm'];
		return $form;
	}


	public function processForm(\Nette\Application\UI\Form $form, $values)
	{
		$this->connection->query('
			INSERT INTO addresses %values
		', [
			'user_id' => $this->getParameter('userId'),
			'address' => $values->address,
		]);
		$this->redirect('UsersList:default');
	}
}
