<?php
namespace Model;

use Core\Database;

class News extends Database
{
	private static $tableName = 'news';

	public  function __contruct()
	{
		parent::__contruct();
	}

	public function getAll()
	{
		$query = "SELECT * FROM " . self::$tableName. " order by id desc";
		$result = mysqli_query($this->DBInstance, $query);
		$data = [];

		while ($row = mysqli_fetch_assoc($result)) {
			array_push($data, $row);
		}

		return $data;
	}

	public function getNewsById($id)
	{
		$query = "SELECT * FROM ".self::$tableName." where id ='".$id."'";
		$result = mysqli_query($this->DBInstance, $query);
		$data = mysqli_fetch_assoc($result);
		
		return $data;
	}

	public function create($title, $content)
	{
		$query = "INSERT news(title,content) VALUES('$title','$content')";
		$result = mysqli_query($this->DBInstance, $query);

  		return $result;
	}

	public function update($id, $title, $content)
	{
		$query = "UPDATE news SET title = '$title', content = '$content' WHERE id = $id";
		$result = mysqli_query($this->DBInstance, $query);

		return $result;
	}

	public function delete($id)
	{		
		$query = "DELETE from news WHERE id = $id";
		$result = mysqli_query($this->DBInstance, $query);

		return $result;
	}

}
?>