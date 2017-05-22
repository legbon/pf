<?php namespace App\Legbon\Repositories;

use App\User;

/**
 * A repo using Eloquent. In case you need to switch ORM
 * then you just make a new one.
 * 
 */
class UserEloquentRepository implements \App\Legbon\User\UserRepositoryInterface {
	public function update($id, $data) {
		$user = User::find($id);
		if(!$user) {
			return false;
		}
		$user->fill($data);
		$user->updated_details = true;
		$user->update();	
		return $user;
	}
}