<?php
    class Users extends Controller
    {
        private $userModel;

        public function __construct()
        {
            $this->userModel = $this->loadModel('User');
        }

        public function login()
        {
            $data = [
                'title' => 'Login page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];

            // Vérifie si méthode POST est utilisé
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'usernameError' => '',
                    'passwordError' => ''
                ];

                if(empty($data['username'])){
                    $data['usernameError'] = 'Veuillez entrer un username';
                }

                if(empty($data['password'])){
                    $data['passwordError'] = 'Veuillez entrer un password';
                }

                if(empty($data['usernameError']) && empty($data['passwordError'])){
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                    if($loggedInUser){
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['passwordError'] = 'Username ou password incorrect. Ressayez !!!';
                        $this->render('/users/login', $data);
                    }
                }
            } else {
                $data = [
                    'username' => '',
                    'password' => '',
                    'usernameError' => '',
                    'passwordError' => ''
                ];
            }
            $this->render('users/login', $data);
        }

        public function register()
        {
            $data = [
                'lastname' => '',
                'firstname' => '',
                'email' => '',
                'avatar' => '',
                'password' => '',
                'confirmPassword' => '',
                'bio' => '',
                'hobbies' => '',
                'newspaperName' => '',
                'lastnameError' => '',
                'firstnameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'lastname' => trim($_POST['lastname']),
                    'firstname' => trim($_POST['firstname']),
                    'email' => trim($_POST['email']),
                    'avatar' => $_FILES["avatar"],
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'bio' => trim($_POST['bio']),
                    'hobbies' => trim($_POST['hobbies']),
                    'newspaperName' => trim($_POST['newspaperName']),
                    'lastnameError' => '',
                    'firstnameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];

                // Validation username & email
                $nameValidation = "/^[a-zA-Z0-9]*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                if(empty($data['email'])){
                    $data['emailError'] = 'Veuillez entrer un email';
                } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                    $data['emailError'] = 'Veuillez entrer un email au bon format !!';
                } else {
                    if($this->userModel->findUserbyEmail($data['email'])){
                        $data['emailError'] = 'Email déjà utilisé !!';
                    }
                }

                if(empty($data['password'])){
                    $data['passwordError'] = 'Veuillez entrer un password';
                } elseif(strlen($data['password']) < 6) {
                    $data['passwordError'] = 'Le mot de passe doit contenir au moins 8 caractères';
                } elseif(preg_match($passwordValidation, $data['password'])){
                    $data['passwordError'] = 'Le mot de passes doit contenir au moins 1 chiffre';
                }

                if(empty($data['confirmPassword'])){
                    $data['confirmPasswordError'] = 'Veuillez entrer la confirmation de mot de passe';
                } else {
                    if($data['password'] != $data['confirmPassword']){
                        $data['confirmPasswordError'] = 'Les mot de passe ne correspondent pas !';
                    }
                }

                if(empty($data['lastnameError']) && empty($data['firstnameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Vérifie si le fichier a été uploadé sans erreur.
                    if(isset($data['avatar']) && $data['avatar']["error"] == 0){
                        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
                        $filename = $data['avatar']["name"];
                        $filetype = $data['avatar']["type"];
                        $filesize = $data['avatar']["size"];

                        // Vérifie l'extension du fichier
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if(!array_key_exists($ext, $allowed)){
                            $data['avatarError'] = "Erreur : Veuillez sélectionner un format de fichier valide.";
                        }

                        // Vérifie la taille du fichier - 1Mo maximum
                        $maxsize = 1 * 1024 * 1024;
                        if($filesize > $maxsize){
                            $data['avatarError'] = "Error: La taille du fichier est supérieure à la limite autorisée.";
                        }

                        // Vérifie le type MIME du fichier
                        if(in_array($filetype, $allowed)){
                            // path of image
                            $img_path = $data['avatar']["tmp_name"];

                            // get the extension of the image to generate base64 string
                            $type = pathinfo($img_path, PATHINFO_EXTENSION);

                            // get the file data
                            $img_data = file_get_contents($img_path);

                            // get base64 encoded code of the image
                            $base64_code = base64_encode($img_data);

                            // create base64 string of image
                            $data['avatar'] = 'data:image/' . $type . ';base64,' . $base64_code;

                        } else{
                            $data['avatarError'] = "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
                        }
                    } else{
                        $data['avatarError'] = "Error: " . $data['avatar']["error"];
                    }

                    if($this->userModel->register($data)){
                        header("Location: ".URL_ROOT."/users/login");
                    } else {
                        die('Une erreur est survenue !!');
                    }
                }
            }
            $this->render('/users/register', $data);
        }

        public function createUserSession($loggedInUser)
        {
            $_SESSION['user_id'] = $loggedInUser->user_id;
            $_SESSION['username'] = $loggedInUser->username;
            $_SESSION['email'] = $loggedInUser->email;
            header('Location: '.URL_ROOT.'/index');
        }

        public function logout()
        {
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            header('Location: '.URL_ROOT.'/users/login');
        }
    }