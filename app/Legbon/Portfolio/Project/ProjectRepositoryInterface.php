<?php namespace App\Legbon\Portfolio\Project;

/**
 * An interface. Because what if I don't
 * wanna use Eloquent, right?
**/
interface ProjectRepositoryInterface {
	public function save($data);
}