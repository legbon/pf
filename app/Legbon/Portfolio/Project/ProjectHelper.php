<?php namespace App\Legbon\Portfolio\Project;
	
class ProjectHelper {
	public function generateSlug($title) {
		return str_slug($title);
	}

	public function processProject($data) {
		$project = $data;
		$project['slug'] = $this->generateSlug($project['title']);
		$project['began'] = $this->convertToDateTime($project['began']);
		$project['ended'] = $this->convertToDateTime($project['ended']);
		return $project;
	}

	public function save($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $repo->save($data);
	}

	public function createProject($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $this->save($this->processProject($data), $repo);
	}

	public function updateProject($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $this->update($this->processProject($data), $repo);
	}

	public function update($data, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $repo->update($data['id'], array_except($data, ['id']));
	}

	public function delete($id, \App\Legbon\Portfolio\Project\ProjectRepositoryInterface $repo) {
		return $repo->delete($id);
	}

	public function convertToDateTime($dateString) {
		if($dateString == '') {
			return null;
		}
		return \Carbon\Carbon::createFromFormat('m/d/Y', $dateString);
	}
}

?>