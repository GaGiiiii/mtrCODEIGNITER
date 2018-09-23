<?php

	class Pages extends CI_Controller{

		public function view($page = 'home'){

			// APPPATH - CONST to application folder

			if(!file_exists(APPPATH . "views/pages/" . $page . '.php')){
				show_404();
			}

			// $data - what we are sending to view file

			$data['title'] = ucfirst($page);

			if($page == 'home'){
				

				// delete test posts

				$this->post_model->show_edited_posts_test();
				$this->post_model->delete_all_test_posts();
				$this->post_model->retrieve_test_deleted_posts();
				$this->category_model->delete_all_test_categories();
				$this->category_model->retrieve_test_deleted_categories();

				$config['base_url'] = base_url() . 'page/';
				$config['total_rows'] = $this->db->count_all('posts');
				// $config['total_rows'] = $this->post_model->get_number_of_posts();
				$config['per_page'] = 7;
				$config['num_links'] = 1;
				$config['use_page_numbers'] = TRUE;

				$config['first_link'] = "FIRST";
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';

				$config['last_link'] = "LAST";
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';

				$config['next_link'] = "&raquo";
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';

				$config['prev_link'] = "&laquo;";
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';

				$config['cur_tag_open'] = '<li class="current"><a>';
				$config['cur_tag_close'] = '</a></li>';

				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';

				$config['first_url'] = '../';
				// gde ce broj page-a biti upisan, /1page/uri2pagenumber 
				$config['uri_segment'] = 2;

				$this->pagination->initialize($config);

				// uzimamo postove iz post_modela i saljemo ovaj data u view

				$offset = 0;

				$data['posts'] = $this->post_model->get_posts_per_page(FALSE, $config['per_page'], $offset);

			}

			// loading views

			// function below automatically looks into views folder 

			$this->load->view('templates/header');

			// go to folder pages and file $page and send the $data

			$this->load->view('pages/' . $page, $data);


			$this->load->view('templates/footer');
			
		}

		public function page($offset = 0){

			$this->post_model->show_edited_posts_test();
			$this->post_model->delete_all_test_posts();
			$this->post_model->retrieve_test_deleted_posts();
			$this->category_model->delete_all_test_categories();
			$this->category_model->retrieve_test_deleted_categories();

			$page = 'home';

			$config['base_url'] = base_url() . 'page/';
			$config['total_rows'] = $this->db->count_all('posts');
			// $config['total_rows'] = $this->post_model->get_number_of_posts();
			$config['per_page'] = 7;
			$config['num_links'] = 1;
			$config['use_page_numbers'] = TRUE;

			$config['first_link'] = "FIRST";
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = "LAST";
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = "&raquo";
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = "&laquo;";
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="current"><a>';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['first_url'] = '../';
			// gde ce broj page-a biti upisan, /1page/uri2pagenumber 
			$config['uri_segment'] = 2;

			$this->pagination->initialize($config);

			// uzimamo postove iz post_modela i saljemo ovaj data u view

			$data['posts'] = $this->post_model->get_posts_per_page(FALSE, $config['per_page'], $offset * 7 - 7);


			$this->load->view('templates/header');

			// go to folder pages and file $page and send the $data

			$this->load->view('pages/' . $page, $data);


			$this->load->view('templates/footer');
		}

		public function invalid($page){
			$data['title'] = 'Stranica u fazi izrade.';
			$data['page'] = $page;

			$this->load->view('templates/header');
			$this->load->view('pages/invalid', $data);
			$this->load->view('templates/footer');
		}

	}






?>