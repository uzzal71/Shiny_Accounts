<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cheque_book extends CI_Controller {
	  public function __construct() {
        parent::__construct();
        $id=$this->session->userdata('id');
        if($id ==NULL)
        {
            redirect('Login','refresh');
        }
          $this->load->model('Cheque_book_model');
        $this->load->model('Account_information_model');
    }


	public function add_new_cheque_book()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
        $data['bank_name']=$this->Account_information_model->select_all_account_information_list_for_cheque_book();
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		 $data['view_account']=$this->Cheque_book_model->select_all_account_no_list();
         $data['maincontent'] = $this->load->view('cheque_book/create_new_cheque_book', $data, true);
         $this->load->view('master', $data);
        
	}
	 public function save_new_cheque_book() {
        $data = array();
        $cheque=array();
        $company_id=$this->session->userdata('company_id');
        $cheque_starting_no=$this->input->post('cheque_starting_no', true);
        $cheque_end_no = $this->input->post('cheque_end_no', true);

        $cheque_starting_char=$this->input->post('cheque_starting_char', true);

        $data['account_no'] = $this->input->post('account_no', true);
        $account_no=$data['account_no'];
        $data['cheque_starting_no'] =strtoupper($cheque_starting_char).$cheque_starting_no;
        $data['cheque_end_no'] = strtoupper($cheque_starting_char).$cheque_end_no;
        
		$data['recording_time'] = $this->input->post('recording_time', true);
		$data['recorded_by'] =$this->session->userdata('user_name');
	   
        $cheque_starting_nos=$data['cheque_starting_no'];
        $cheque_end_nos= $data['cheque_end_no'];

        $check=$this->Cheque_book_model->select_all_cheque_no($account_no,$cheque_starting_nos,$cheque_end_nos);

        if ($check==null) {

            for ($i=$cheque_starting_no;  $i<= $cheque_end_no; $i++) { 
        $cheque_no=$i;
        $cheque['account_no']=$account_no;
        $cheque['cheque_no']=strtoupper($cheque_starting_char).$cheque_no;
        $cheque_no=$cheque['cheque_no'];
        $cheque['is_used']=0;
        $cheque['created_at']=date("y-m-d H:i:s");
        $cheque['created_by']=$this->session->userdata('user_name');
        $cheque['company_id']=$company_id;

        $stored=$this->Cheque_book_model->store_cheque_book_info($cheque);
        print_r($cheque);
        echo "</br>";
          
       }

     

        $this->Cheque_book_model->save_new_cheque_book_info($data);
        $sdata['message']='Cheque Book Information saved sucessfully';
           $this->session->set_userdata($sdata);
        redirect('Cheque_book/add_new_cheque_book');

           
        } else{


            $sdata['message']='Cheque Book Already Exists';
           $this->session->set_userdata($sdata);
        redirect('Cheque_book/add_new_cheque_book');

        }

       
                       
    }
		public function cheque_book_list()
	{
		 $data = array();
         $data['title']="2RA Technology Limited";
         $data['keyword']="";
         $data['description']="";
       
         $data['menu'] = $this->load->view('menu', $data, true);
		 $data['sidenavbar'] = $this->load->view('sidenavbar', $data, true);
		   $data['view_cheque_book_list']=$this->Cheque_book_model->select_all_cheque_book_list();
        $data['maincontent'] = $this->load->view('cheque_book/cheque_book_list', $data, true);
		
        $this->load->view('master', $data);
        
    
	}

    public function pick_account_no(){


            $bank_name=$this->input->post('bank_name', true);
            $account_nos=$this->Account_information_model->select_all_account_no($bank_name);
            //print_r($bank_name);exit();
            if ($account_nos) {
                $return_html = '<option value="select">Select</option>';
            foreach($account_nos as $account_no)
            {
                
                $return_html = $return_html.'<option value = "'.$account_no->account_no.'">'.$account_no->account_no.'</option>';
            }
        
                echo $return_html;
              
            }else{

                echo "No Account in ".$bank_name;
            }

    }



    public function pick_cheque(){

         $company_id=$this->session->userdata('company_id');
        $account_no=$this->input->post('account_no',true);
        $cheque_numbers=$this->Cheque_book_model->retrieve_cheques($company_id,$account_no);

           if ($cheque_numbers) {
                $return_html = '<option value="select">Select</option>';
            foreach($cheque_numbers as $cheque)
            {
                
                $return_html = $return_html.'<option value = "'.$cheque->cheque_no.'">'.$cheque->cheque_no.'</option>';
            }
        
                echo $return_html;
              
            }else{

                echo "No Cheque Found ".$account_no;
            }

    }	
	
	
}
