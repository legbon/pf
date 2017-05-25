<?php namespace App\Legbon\Portfolio\Plan;

/**
 * An interface. Because what if I don't
 * wanna use Eloquent, right?
**/
interface PlanRepositoryInterface {
	public function save($data);
	public function update($id, $data);
	public function delete($id);
}