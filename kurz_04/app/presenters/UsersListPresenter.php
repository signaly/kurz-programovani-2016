<?php

class UsersListPresenter extends BasePresenter
{
	/**
	 * @var \Nextras\Dbal\Connection
	 * @inject
	 */
	public $connection;


	public function actionDefault()
	{
	}


	/**
	 * @secured
	 */
	public function handleDelete(int $userId)
	{
		$this->connection->query('DELETE FROM users WHERE id = %i', $userId);
		$this->redirect('this');
	}


	public function renderDefault()
	{
		$users = $this->connection->query("
			SELECT u.*, GROUP_CONCAT(a.address SEPARATOR '\n') AS addresses
			FROM users AS u
				LEFT JOIN addresses AS a ON (a.user_id = u.id)
			GROUP BY u.id	
			ORDER BY u.id
		")->fetchAll();

		$this->template->users = $users;
	}
}
