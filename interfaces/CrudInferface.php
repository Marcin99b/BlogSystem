<?php
//Coming soon
interface CrudInterfaceController
{
	private function create(){};
	private function select(){};
	private function update(){};
	private function delete(){};
}

interface CrudInterfaceModel
{
	public function create(){};
	public function select(){};
	public function update(){};
	public function delete(){};
}
