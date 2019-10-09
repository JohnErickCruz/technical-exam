<?php
namespace Model;

use Core\Database;
use Model\DatabaseConnection;

class Comments extends Database
{
	private static $tableName = 'comments';

	public  function __contruct()
	{
		parent::__contruct();
	}

	public function getByNewsId($newsId)
	{
		$query = "SELECT * FROM " . self::$tableName . " where news_id = $newsId order by id desc";
		$result = mysqli_query($this->DBInstance, $query);
		$data = [];

		while ($row = mysqli_fetch_assoc($result)) {
			array_push($data, $row);
		}

		return $data;
	}

	public function create($newsId, $comment)
	{
		$query = "INSERT comments(news_id,comment) VALUES('$newsId','$comment')";
		$result = mysqli_query($this->DBInstance, $query);

  		return $result;
	}

	public function delete($id)
	{		
		$query = "DELETE from comments WHERE id = $id";
		$result = mysqli_query($this->DBInstance, $query);

		return $result;
	}

}
?>