<?php
namespace Controllers;

use Core\Controller;
use Model\News;

class NewsController extends Controller
{
	private static $directory = 'news';

	private $model;

	public function __construct()
	{
		$this->model = new News();
	}

	public function index()
	{
		$viewData = [
			'news' => $this->model->getAll()
		];

		$this::render(
			self::$directory,
			'index',
			$this->model->getAll()
		);
	}

	public function newsLists()
	{
		$newsModel = new News();
		$viewData = $newsModel->getAll();
		$data = [];
		
		if (count($viewData) > 0) {

			foreach($viewData as $row){
				$data['news'][] = [
					'id' => $row['id'],
					'title' => $row['title'],
					'content' => $row['content'],
				];
			}

		} else {
			$data['news'] = [];
		}

		echo json_encode($data);
	}

	public function getAll($filters = [])
	{
		if (empty($filters)) {
			$result = $this->model->getAll();
		}

		return $result;
	}

	public function get($id)
	{
		return $this->model->get($id);
	}

	public function getNewsById($id)
	{
		return $this->model->getNews($id);
	}

	public function getNews($id)
	{
		return $this->model->getNews($id);
	}

	public function add($data)
	{
		$result = $this->model->create($data['title'], $data['content']);
		
		return $result;
	}

	public function edit($data)
	{
		$result = $this->model->update($data['id'], $data['title'], $data['content']);

		return $result;
	}

	public function delete($id)
	{
		$result = $this->model->delete($id);

		return $result;
	}
}