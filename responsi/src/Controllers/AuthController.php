<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
		$this->redirectIfHasLoggedIn();

		$urls = [
			[
				'name' => 'Student',
				'url' => '/student',
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-12"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg>'
			],
			[
				'name' => 'Program Study',
				'url' => '/program-study',
				'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-12"><path d="M2 6h4"/><path d="M2 10h4"/><path d="M2 14h4"/><path d="M2 18h4"/><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9.5 8h5"/><path d="M9.5 12H16"/><path d="M9.5 16H14"/></svg>'
			]
		];

        $this->render('login', [
			'urls' => $urls,
			'title' => 'Login',
			'mainClass' => 'flex items-center justify-center'
		]);
    }

	public function htmxLogin($req)
	{
		$this->redirectIfHasLoggedIn();

		$email =  $req['email'];
		$password =  $req['password'];

		try {
			$user = $this->model('Users')->getByEmail($email);
			if (!$user || $password != $user['password']) {
				$this->errorMessage('Invalid email or password.', true);
				return;
			}

			session_start();
			$_SESSION['user'] = [
				'id' => $user->id,
				'name' => $user->name,
				'email' => $user->email,
			];

			$this->successMessage('Success to logged in.');
			echo "<script>setTimeout(() => { window.location.href = '/' }, 500)</script>";
		} catch(\Exception $e) {
			$this->errorMessage('Failed to logged in.', true);
		}
	}

	public function logout()
	{
		$this->mustBeLoggedIn();
		session_destroy();
		header('Location: /login');
	}
}
