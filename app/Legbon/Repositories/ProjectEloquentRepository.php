<?php namespace App\Legbon\Repositories;

use App\Project;

/**
 * A repo using Eloquent. In case you need to switch ORM
 * then you just make a new one.
 * 
 */
class ProjectEloquentRepository implements \App\Legbon\Portfolio\Project\ProjectRepositoryInterface {
	public function save($data) {
		return Project::create($data);
	}
}