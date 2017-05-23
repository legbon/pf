<?php namespace App\Legbon\User;

class UserHelper {
	public function update($data, \App\Legbon\User\UserRepositoryInterface $repo) {
		return $repo->update($data);
	}

	public function updateValidation($data) {
		$result = ['ok' => true, 'err' => 'UPDATE_OK'];

		$result = $this->validatePasswordLimit($data['password']) 
			? $result : ['ok' => false, 'err' => config('errors')['PASSWORD_NOT_LIMIT']];

		$result = $this->validatePasswordEquality($data['password'], $data['confirm_password']) 
			? $result : ['ok' => false, 'err' => config('errors')['PASSWORD_NOT_EQUAL']];

		$result = \Hash::check($data['old_password'], $data['current_password'])
			? $result : ['ok' => false, 'err' => config('errors')['PASSWORD_INCORRECT']];

		return $result;
	}

	public function validatePasswordEquality($password, $confirm) {
		if($password != $confirm) {
		    return false;
		}
		return true;
	}

	public function validatePasswordLimit($password) {
		if( (strlen($password) < config("site")['PASSWORD_MIN']) || 
			( strlen($password) > config("site")['PASSWORD_MAX']) ) {
			return false;
		}
		return true;
	}

}

?>