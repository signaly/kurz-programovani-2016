<?php


class NewAddressPresenter extends BasePresenter
{
	/** @var \Nextras\Dbal\Connection @inject */
	public $connection;

	/** @var Model @inject */
	public $model;

	/** @var User */
	private $member;


	public function actionDefault(int $userId)
	{
		$user = $this->model->users->getById($userId);
		if ($user === null) {
			$this->error();
		}

		$this->member = $user;
	}


	public function renderDefault()
	{
		$this->template->member = $this->member;
	}


	protected function createComponentAddAddress()
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
		$address = new Address();
		$address->address = $values->address;
		$address->user = $this->member;

		$this->model->addresses->persistAndFlush($address);
		$this->redirect('UsersList:default');
	}
}
