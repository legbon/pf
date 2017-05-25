<?php namespace App\Legbon\Portfolio\Plan;

class PlanHelper {

	// TODO: Extract this from here and project helper and create a new class for it.
	public function generateSlug($title) {
		return str_slug($title);
	}

	public function processPlan($data) {
		$plan = $data;
		if(!$this->validateTitle($plan['title'])) {
			return false;
		}

		if(!$this->validateDescription($plan['description'])) {
			return false;
		}
		$plan['slug'] = $this->generateSlug($plan['title']);
		return $plan;
	}

	public function validateTitle($title) {
		if($title == '') {
			return false;
		}
		return true;
	}

	public function validateDescription($description) {
		if($description == '') {
			return false;
		}
		return true;
	}

	public function save($data, PlanRepositoryInterface $repo) {
		return $repo->save($data);
	}

}

?>