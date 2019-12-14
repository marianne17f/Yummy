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

	public function setArchive($archive)
	{
		$this->archive =$archive;
	}

	public function getArchive() 
	{
		return $this->archive;
	}



	// validate (and put online) recipe, event and address
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

