<?php 

	class Category_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
			$this->db->order_by('name');

			// get categories table
			$query = $this->db->get('categories');

			return $query->result_array();
		}

		public function create_category(){
			$data = array(
				'name' => $this->input->post('name')
			);

			return $this->db->insert('categories', $data);
		}

		public function create_category_test(){

			$date = date("d-m-Y H:i:s");

			$data = array(
				'name' => $this->input->post('name'),
				'test' => 1,
				'created_at' => $date,
			);

			return $this->db->insert('categories', $data);
		}

		public function delete_category($id){

			// nadji sve postove sa tom kategorijom i promeni ih na uncategoriesed

			$data = array('category_id' => 0);
			$this->db->where('posts.category_id', $id);
			$this->db->update('posts', $data);

			// koji da izbrise

			$this->db->where('id', $id);

			// iz koje tabele

			$this->db->delete('categories');

			return true;
		}

		public function delete_category_test($id){

			// nadji sve postove sa tom kategorijom i promeni ih u uncategoriesed
			// ne mnora ovde jer ce kategorija zapravo ostati u database, nece stvarno nestati,
			// i onda ce se proveriti if u HOME PAGE i dodeliti mu uncategorised

			$date = date("d-m-Y H:i:s");

			$data = array('deleted' => 1, 'deleted_at' => $date);

			$this->db->where('id', $id);

			return $this->db->update('categories', $data);
		}

		public function get_category($name){
			$query = $this->db->get_where('categories', array('name' => $name, 'deleted' => 0));

			return $query->row();
		}







		// ********************* KATEGORIJE KOJI SU NAPRAVLJENE KAO TEST KATEGORIJE *************************

		public function delete_all_test_categories(){

			// koji da izbrise

			$test_categories = $this->db->get_where('categories', array('test' => 1))->result_array();
			$delete_ids = array();

			foreach($test_categories as $test_category){
				if(time() - strtotime($test_category['created_at']) >= 60){
					array_push($delete_ids, $test_category['id']);
				}
			}

			foreach($delete_ids as $delete_id){
				$this->db->where('id', $delete_id);
				$this->db->delete('categories');
			}

			return true;
		}

		public function retrieve_test_deleted_categories(){

			// koji da izbrise

			$test_categories = $this->db->get_where('categories', array('deleted' => 1))->result_array();
			$retrieve_ids = array();

			foreach($test_categories as $test_category){
				if(time() - strtotime($test_category['deleted_at']) >= 30){
					array_push($retrieve_ids, $test_category['id']);
				}
			}

			foreach($retrieve_ids as $retrieve_id){
				$data = array('deleted' => 0, 'deleted_at' => '');
				$this->db->where('id', $retrieve_id);
				$this->db->update('categories', $data);
			}

			return true;
		}

	}


?>