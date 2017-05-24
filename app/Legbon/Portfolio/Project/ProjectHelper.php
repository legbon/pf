<?php namespace App\Legbon\Portfolio\Project;
	
class ProjectHelper {
	public function generateSlug($title) {
		return str_slug($title);
	}

	public function processProject($data) {
		$project = $data;
		$project['slug'] = $this->generateSlug($project['title']);
		return $project;
	}

	public function save($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $repo->save($data);
	}

	public function createProject($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $this->save($this->processProject($data), $repo);
	}

}

?>