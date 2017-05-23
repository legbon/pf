<?php namespace App\Legbon\User;

class UserHelper {
	public function update($data, \App\Legbon\User\UserRepositoryInterface $repo) {
		return $repo->update($data);
	}
}

?>