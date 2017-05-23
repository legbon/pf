<?php namespace App\Legbon\User;

class UserHelper {
	public function update($data, \App\Legbon\User\UserRepositoryInterface $repo) {
		return $repo->update($data);
	}

	public function updateValidation($data) {
		$result = ['ok' => true, 'err' => 'UPDATE_OK'];
		$result = $this->passwordEquality($data['password'], $data['confirm_password']) 
			? $result : ['ok' => false, 'err' => config('errors')['PASSWORD_NOT_EQUAL']];
		return $result;
	}

	public function passwordEquality($password, $confirm) {
		if($password != $confirm) {
		    return false;
		}
		return true;
	}


}

?>