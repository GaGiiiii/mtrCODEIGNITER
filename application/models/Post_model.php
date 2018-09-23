<?php 

	class Post_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function get_posts($slug = FALSE){

			// SLUG JE SAMO AKO UZIMAMO JEDAN POST 

			if($slug === false){

				$this->db->order_by('posts.id', "DESC");

				// joinovanje POGLEDAJ U VIEWS MOC JOINA !!!

				// $this->db->join('categories', 'categories.id = posts.category_id');

				$query = $this->db->get('posts');

				// uzmi sve postove

				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));

			// uzmi jedan post

			return $query->row_array();
		}

		public function get_number_of_posts(){
			$query = $this->db->get_where('posts', array('deleted' => 0));

			return count($query->result_array());
		}

		public function get_posts_per_page($slug = FALSE, $limit = FALSE, $offset = FALSE){

			if($limit){
				$this->db->limit($limit, $offset);
			}

			// SLUG JE SAMO AKO UZIMAMO JEDAN POST 

			if($slug === false){

				$this->db->order_by('posts.id', "DESC");

				// joinovanje POGLEDAJ U VIEWS MOC JOINA !!!

				// $this->db->join('categories', 'categories.id = posts.category_id');

				$query = $this->db->get('posts');

				// uzmi sve postove

				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('slug' => $slug));

			// uzmi jedan post

			return $query->row_array();
		}

		public function create_post($post_file){

			/*
			
				$title = "What's wrong with CSS?";
				$url_title = url_title($title);
				Produces: Whats-wrong-with-CSS

			*/

			$slug = url_title($this->input->post('title'));

			$date = date("d-m-Y H:i:s");

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'slug' => $slug,
				'created_at' => $date,
				'test' => 0,
				'user_id' => $this->session->userdata('user_id'),
				// ovo dobijamo iz name od selecta
				'category_id' => $this->input->post('category_id'),
				'post_file' => $post_file
			);

			return $this->db->insert('posts', $data);
		}

		public function create_post_test($post_file){

			$user_id = 8624;

			$slug = url_title($this->input->post('title'));

			$date = date("d-m-Y H:i:s");

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'slug' => $slug,
				'created_at' => $date,
				'test' => 1,
				'user_id' => $user_id,
				// ovo dobijamo iz name od selecta
				'category_id' => $this->input->post('category_id'),
				'post_file' => $post_file
			);

			return $this->db->insert('posts', $data);
		}

		public function delete_post($id){

			// koji da izbrise

			$this->db->where('id', $id);

			// iz koje tabele

			$this->db->delete('posts');

			return true;
		}

		public function delete_post_test($id){

			$date = date("d-m-Y H:i:s");

			$data = array('deleted' => 1, 'deleted_at' => $date);

			$this->db->where('id', $id);

			return $this->db->update('posts', $data);
		}

		// ***************************************************************************************************************

		public function retrieve_test_deleted_posts(){

			// koji da izbrise

			$test_posts = $this->db->get_where('posts', array('deleted' => 1))->result_array();
			$retrieve_ids = array();

			foreach($test_posts as $test_post){
				if(time() - strtotime($test_post['deleted_at']) >= 30){
					array_push($retrieve_ids, $test_post['id']);
				}
			}

			foreach($retrieve_ids as $retrieve_id){
				$data = array('deleted' => 0, 'deleted_at' => '');
				$this->db->where('id', $retrieve_id);
				$this->db->update('posts', $data);
			}

			return true;
		}

		// ********************* POSTOVI KOJI SU NAPRAVLJENI KAO TEST POSTOVI **************************

		public function delete_all_test_posts(){

			// koji da izbrise

			$test_posts = $this->db->get_where('posts', array('test' => 1, 'user_id' => 8624))->result_array();
			$delete_ids = array();

			foreach($test_posts as $test_post){
				if(time() - strtotime($test_post['created_at']) >= 120){
					array_push($delete_ids, $test_post['id']);
				}
			}

			foreach($delete_ids as $delete_id){
				$this->db->where('id', $delete_id);
				$this->db->delete('posts');
			}

			return true;
		}

		public function update_post($post_file){

			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
				'slug' => $slug,
				'category_id' => $this->input->post('category_id'),
				'post_file' => $post_file
			);

			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('posts', $data);
		}

		public function update_post_test($post_file){

			$slug = url_title($this->input->post('title'));
			$slugBUP = url_title($this->input->post('slug'));

			$date = date("d-m-Y H:i:s");

			$backup = $this->db->get_where('posts', array('id' => $this->input->post('id')))->row_array();
			
			$title = $backup['title'];
			$body = $backup['body'];
			$category_id = $backup['category_id'];
			$post_file_bup = $backup['post_file'];


			if(!$backup['edited']){
				$edit_backup = "Title: " . $title . " Body: " . $body . " Category_id: " . $category_id . " Slug: " . $slugBUP . " Post_file: " . $post_file_bup;
			}else{
				$edit_backup = $backup['edit_backup'];
			}

			$data = array(
				'edited' => 1,
				'edited_at' => $date,
				'body' => $this->input->post('body'),
				'title' => $this->input->post('title'),
				'category_id' => $this->input->post('category_id'),
				'slug' => $slug,
				'post_file' => $post_file,
				'edit_backup' => $edit_backup
			);

			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('posts', $data);
		}

		public function show_edited_posts_test(){

			// koji da izbrise

			$test_posts = $this->db->get_where('posts', array('edited' => 1))->result_array();
			$edited_ids = array();

			foreach($test_posts as $test_post){
				if(time() - strtotime($test_post['edited_at']) >= 30){
					array_push($edited_ids, $test_post['id']);
				}
			}

			foreach($edited_ids as $edited_id){

				$backup = $this->db->get_where('posts', array('id' => $edited_id))->row_array()['edit_backup'];

				// echo $backup;

				$title_pos = strpos($backup, 'Title: ') + 7;
				$body_pos = strpos($backup, 'Body: ') + 6;
				$category_id_pos = strpos($backup, 'Category_id: ') + 13;
				$slug_pos = strpos($backup, 'Slug: ') + 6;
				$post_file_pos = strpos($backup, 'Post_file: ') + 11;

				// echo "Title: " . $title_pos . " Body: " . $body_pos . " Category_id: " . $category_id_pos . " Slug: " . $slug_pos . " Post_file: " . $post_file_pos;

				// TITLE

				$startIndex = $title_pos;		
				$length = $body_pos - $title_pos - 6;
				// $between = substr($backup, $title_pos, $length - 1);
				$title = substr($backup, $title_pos, $length - 1);
				// echo "<br><br>" . $between . "s";

				// TITLE

				// BODY

				$startIndex = $body_pos;		
				$length = $category_id_pos - $body_pos - 13;
				// $between = substr($backup, $body_pos, $length - 1);
				$body = substr($backup, $body_pos, $length - 1);
				// echo "<br>" . $between . "s";

				// BODY

				// CATEGORY

				$startIndex = $category_id_pos;		
				$length = $slug_pos - $category_id_pos - 6;
				// $between = substr($backup, $category_id_pos, $length - 1);
				$category_id = substr($backup, $category_id_pos, $length - 1);
				// echo "<br>" . $between . "s";

				// CATEGORY

				// SLUG

				$startIndex = $slug_pos;		
				$length = $post_file_pos - $slug_pos - 11;
				// $between = substr($backup, $slug_pos, $length - 1);
				$slug = substr($backup, $slug_pos, $length - 1);
				// echo "<br>" . $between . "s";

				// SLUG

				// POST_FILE

				$startIndex = $post_file_pos;		
				$length = strlen($backup) - $post_file_pos;
				if($length == 0){
					$post_file = "";
				}else{
					$post_file = substr($backup, $post_file_pos, $length);
				}
				// $between = substr($backup, $post_file_pos, $length - 1);
				
				// echo "<br>" . $between . "s";

				// POST_FILE

				$data = array(
					'edited' => 0, 
					'edited_at' => '',
					'title' => $title,
					'body' => $body,
					'category_id' => $category_id,
					'slug' => $slug,
					'post_file' => $post_file,
					'edit_backup' => ''
				);

				$this->db->where('id', $edited_id);
				$this->db->update('posts', $data);
			}

			return true;

		}

		// ***************************************************************************************************************

		public function get_categories(){
			$this->db->order_by('name');

			// get categories table
			$query = $this->db->get('categories');

			return $query->result_array();
		}

		public function get_posts_by_category($category_name){
			$category_id = $this->db->get_where('categories', array('name' => $category_name))->row()->id;
			
			$this->db->order_by('posts.id', 'DESC');
			$this->db->join('categories', 'categories.id = posts.category_id');

			$query = $this->db->get_where('posts', array('category_id' => $category_id, 'posts.deleted' => 0));

			return $query->result_array();
		}

		public function get_uncategorised_posts(){
			$query = $this->db->get_where('posts', array('category_id' => 0));

			return $query->result_array();
		}

	}







?>