<?php namespace App\Legbon\Repositories;

use App\Plan;

/**
 * A repo using Eloquent. In case you need to switch ORM
 * then you just make a new one.
 * 
 */
class PlanEloquentRepository implements \App\Legbon\Portfolio\Plan\PlanRepositoryInterface {
	public function save($data) {
		return Plan::create($data);
	}

	public function update($id, $data) {
		$plan = Plan::find($id);
		if(!$plan) {
			return false;
		}

		$plan->fill($data);
		return $plan->update();
	}

	public function delete($id) {
		$plan = Plan::find($id);
		if(!$plan) {
			return false;
		}
		$plan->deleted = true;
		return $plan->update();		
	}
}