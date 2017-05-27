<?php

use Nextras\Orm\Collection\ICollection;


class UsersListPresenter extends BasePresenter
{
	/**
	 * @var \Nextras\Dbal\Connection
	 * @inject
	 */
	public $connection;

	/** @var Model @inject */
	public $model;


	public function actionDefault()
	{
	}


	/**
	 * @securedh
	 */
	public function handleDelete(int $userId)
	{
		$user = $this->model->users->getById($userId);
		if (!$user) {
			$this->error();
		}

		$this->model->remove($user);
		$this->model->flush();

		$this->redirect('this');
	}


	public function renderDefault()
	{
		$this->template->users = $this->model->users
			->findWithAtLeast2Addresses()
			->orderBy('id', ICollection::DESC);
	}
}
