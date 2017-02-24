<?php	
function login(){
	if (isset($_POST['pseudo'])) {
		$data = $_POST;
		user = findFirst([
			"table" => "users",
			"conditions" => ["pseudo" => $data['pseudo']]
		]);

		if (password_verify($data['mdp'], $user->mdp)) {
	    	$_SESSION['User'] = $user;
	    	redirection('home');
		} else {
			echo 'Le mot de passe est invalide.';
		}
	}
	render();
}

function logout(){
	unset($_SESSION['User']);
	redirection('home');
}

function register() {
	if (isset($_POST['pseudo'])) {
		$data = $_POST;
		$data['mdp'] = password_hash($data['mdp'], PASSWORD_DEFAULT);
		$data['inscrit'] = time();

		if ($data['code'] == $_SESSION['code']) {
			unset($data['code']);
			save([
				'table' => 'users',
				'data'	=> $data
			]);
			redirection('home');
		}
	}
	render();
}