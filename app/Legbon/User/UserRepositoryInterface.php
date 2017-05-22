<?php namespace App\Legbon\User;

/**
 * An interface for the User Repository in case 
 * an ORM/DB switch is needed or something.
 * I have no idea if I did this right but it works.
 */
interface UserRepositoryInterface {
	public function update($id, $data);
}