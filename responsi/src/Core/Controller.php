<?php

namespace App\Core;

class Controller
{
	protected $layout = 'default';

	public function __construct()
	{
		session_start();
	}

    protected function render($view, $data = [])
    {
        extract($data);

        include __DIR__ . "/../Views/_layout/header.php";
        include __DIR__ . "/../Views/$view.php";
        include __DIR__ . "/../Views/_layout/footer.php";
    }

    protected function renderHTMX($view, $data = [])
    {
        extract($data);

        include __DIR__ . "/../Views/$view.php";
    }

    protected function model($model)
    {
        require_once __DIR__ ."/../Models/$model.php";
        $modelClass = "App\\Models\\$model";
        return new $modelClass;
    }

	protected function isLoggedIn()
	{
		return isset($_SESSION['user']);
	}

	protected function getUser()
	{
		return $_SESSION['user'] ?? null;
	}

	protected function mustBeLoggedIn()
	{
		if (!$this->isLoggedIn()) {
			header('Location: ' . BASE_PATH . '/login');
		}
	}

	protected function redirectIfHasLoggedIn()
	{
		if ($this->isLoggedIn()) {
			header('Location: ' . BASE_PATH . '/');
		}
	}

	protected function successMessage($message)
	{
		echo "<div class=\"p-4 mb-4 text-sm text-success-800 rounded-lg bg-success-50 border border-success-300\" role=\"alert\"><span class=\"font-medium\">Success!</span> {$message}</div>";
	}

	protected function errorMessage($message, $autoClose = false)
	{
		if ($autoClose) echo "<div _=\"on load wait 3s then remove me\">";
		echo "<div class=\"p-4 mb-4 text-sm text-danger-800 rounded-lg bg-danger-50 border border-danger-300\" role=\"alert\"><span class=\"font-medium\">Opps!</span> {$message}</div>";
		if ($autoClose) echo "</div>";
	}

	protected function closeModal()
	{
		echo "<button type=\"button\" _=\"on click trigger closeModal\" class=\"cursor-pointer px-4 py-2 text-white bg-primary-500 rounded-md hover:bg-primary-600 transition-colors duration-300\">Close</button>";
	}
}
