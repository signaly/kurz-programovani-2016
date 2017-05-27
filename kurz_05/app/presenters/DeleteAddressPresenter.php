<?php

class DeleteAddressPresenter extends BasePresenter
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

		$addresses = $this->connection->query('
			SELECT id, address FROM addresses WHERE user_id = %i
		', $this->member->id)->fetchPairs('id', 'address');

		$form->addSelect('address', 'Adresa ke smazání', $addresses)
			->setPrompt('--vyber adresu--')
			->setRequired();

		$form->addSubmit('send', 'Odeslat');
		$form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
		$form->onSuccess[] = [$this, 'processForm'];

		return $form;
	}


	public function processForm(\Nette\Application\UI\Form $form, $values)
	{
		$this->connection->query('DELETE FROM addresses WHERE id = %i', $values->address);
		$this->redirect('UsersList:default');
	}
}
