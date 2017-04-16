<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report  extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $usergroup = $this->session->userdata('id_usergroup');
        $cls = $this->router->fetch_class();
        $mtd = $this->router->fetch_method();
        $this->antauth->check($usergroup,$cls,$mtd);
    }

    public function index()
    { 
    $data =  $this->load->view('basic','',true); 
    $this->mpdf->WriteHTML($data);
    $this->mpdf->Output();

    }

    public function template()
    { 
    $this->mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins

    $this->mpdf->defaultheaderfontsize = 10;	/* in pts */
    $this->mpdf->defaultheaderfontstyle = B;	/* blank, B, I, or BI */
    $this->mpdf->defaultheaderline = 1; 	/* 1 to include line below header/above footer */

    $this->mpdf->defaultfooterfontsize = 12;	/* in pts */
    $this->mpdf->defaultfooterfontstyle = B;	/* blank, B, I, or BI */
    $this->mpdf->defaultfooterline = 1; 	/* 1 to include line below header/above footer */


    $this->mpdf->SetHeader('{DATE j-m-Y}|{PAGENO}/{nb}|My document');
    $this->mpdf->SetFooter('{PAGENO}');	/* defines footer for Odd and Even Pages - placed at Outer margin */

    $this->mpdf->SetFooter(array(
//            'L' => array(
//                    'content' => 'Text to go on the left',
//                    'font-family' => 'sans-serif',
//                    'font-style' => 'B',	/* blank, B, I, or BI */
//                    'font-size' => '10',	/* in pts */
//            ),
            'R' => array(
                    'content' => '{PAGENO}',
                    'font-family' => 'serif',
                    'font-style' => 'BI',
                    'font-size' => '12',	/* gives default */
            ),
//            'R' => array(
//                    'content' => 'Printed @ {DATE j-m-Y H:m}',
//                    'font-family' => 'monospace',
//                    'font-style' => '',
//                    'font-size' => '10',
//            ),
            'line' => 1,		/* 1 to include line below header/above footer */
    ), 'E'	/* defines footer for Even Pages */
    );
   
    $data =  $this->load->view('template','',true); 
    
    $this->mpdf->WriteHTML($data);
    $this->mpdf->Output();
    }
   
   
}