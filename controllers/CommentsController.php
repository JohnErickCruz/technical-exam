<?php
namespace Controllers;

use Core\Controller;
use Model\Comments;
use Model\News;

class CommentsController extends Controller
{
	private static $directory = 'comments';
	private $commentModel;

	public function __construct()
	{
		$this->commentModel = new Comments();
	}

	public function getByNewsId($id)
	{
		$newsModel = new News();
		$viewData = [
			'comment' => $this->commentModel->getByNewsId($id),
			'news' => $newsModel->getNewsById($id)
		];

		$this::render(
			self::$directory,
			'comment',
			$viewData
		);
	}

	public function commentsLists($id)
	{
		$newsModel = new News();
		$viewData = $this->commentModel->getByNewsId($id);
		$data = [];
		
		if (count($viewData) > 0) {
			foreach($viewData as $row){
				$data['comments'][] = [
					'id' => $row['id'],
					'date' => date('F j, Y g:ia', strtotime($row['created_at'])),
					'name' => 'John Erick Cruz',
					'comment' => $row['comment']
				];
			}

		} else {
			$data['comments'] = [];
		}

		echo json_encode($data);
	}

	public function addComment($data)
	{
		$result = $this->commentModel->create($data['comment_id'], $data['comment']);
		return $result;
	}

	public function deleteComment($id)
	{
		$result = $this->commentModel->delete($id);

		return $result;
	}
}
