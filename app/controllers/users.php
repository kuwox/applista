#CAKEPHP/APP/controllers/users.php
function login(){
	$user = null;
	#buscamos un usuario en la BASE de datos a partir de su 'username'
	if(!empty($this->data) && strlen($this->data['User']['pass'])>6)
		$user = $this->User->findAllByUsername($this->data['User']['username']);
		#verificamos que el usuario exista
		if(count($user) == 1) {
			$user = $user[0];
			#hacemos el login del joomla
			#dividiendo el password en la BD en 2 partes a partir del simbolo ':'
			$parts	= explode( ':', $user['User']['password'] );
			#la 1ra parte es el password ya encriptado
			$crypt	= $parts[0];
			#la 2da la cadena salt q se concatena con el password para ecriptar
			$salt	= @$parts[1];
			#Joomla ocupa MD5 como mecanismo de encriptacion y cakephp SHA1
			$passcrypt = md5($this->data['User']['pass'].$salt);
			#comparamos el password encriptado con el generado.
			if ($crypt == $passcrypt) {
				#CONGRATULATION! ';¬D,
				$this->data['User']['password'] = $passcrypt.':'.$salt;
				$this->Auth->login($this->data);
				$this->redirect('index');
			}
	}
}