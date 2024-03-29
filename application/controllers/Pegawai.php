<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pegawai extends CI_Controller {
    private $limit = 10;
    var $module_name = 'pegawai';
	
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Pegawai'=>'pegawai'));
    }
	
    public function index($offset=0){
        $result                 = $this->pegawai->get_list($this->limit, $offset);
        $data['sSQL']           = $result['rows'];
        $data['num_results']    = $result['num_rows'];
        // load pagination library
        $this->load->library('pagination');
        $config = array(
            'base_url'          => site_url($this->module_name.'/index'),
            'total_rows'        => $data['num_results'],
            'per_page'          => $this->limit,
            'uri_segment'       => 3,
            'use_page_numbers'  => TRUE,
            'num_links'         => 5,
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('v_pegawai',$data); //memanggil view 
    }
    
    public function export_xls() {
        $filename = 'xls-pegawai_'.date('Ymd').'-'.date('His');
        $query['exportfile'] = $filename.'.xls';
        $query['records'] = $this->pegawai->export_xls();
        $this->load->view('xls_pegawai',$query);
    }
    
}


/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */