<?php 
abstract class AbstractEntity
{
	protected $id;
	protected $archive;
	protected $validation;


	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getId() 
	{
		return $this->id;
	}


	// Archives elements (stored in the DB but not displayed in the web site)
	public function setArchive($archive)
	{
		$this->archive =$archive;
	}

	public function getArchive() 
	{
		return $this->archive;
	}



	// (Admin) Validates (and puts online) recipe, event and address
	public function getValidation()
	{
		return $this->validation;
	}

	public function setValidation($validation)
	{
		$this->fk_user = $validation;
	}



	
}

 ?>

