<?php 
abstract class AbstractEntity
{
	protected $id;
	protected $archive;

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



	
}

 ?>

