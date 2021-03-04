<?php
	/**
	 * Class Pages
	 * Gère les pages statiques
	 */
	class Pages extends Controller {
        private $postModel;
        private $userModel;
		/**
		 * Pages constructor.
		 */
		public function __construct() {
			$this->userModel = $this->loadModel('User');
            $this->postModel = $this->loadModel('Post');
		}
		
		/**
		 * Page Accueil
		 */
		public function index() {
            $posts = $this->postModel->findAllPosts();

            $data = [
                'posts' => $posts
            ];
			
			$this->render('index', $data);
		}
		
		/**
		 * Page About
		 */
		public function about() {
			$data = [
				'title' => 'About me'
			];
			$this->render('pages/about', $data);
		}
	}
