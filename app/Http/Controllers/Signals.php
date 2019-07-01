<?php 

// 
namespace Iag\Http\Controllers;

use Iag\Http\Controllers\SSP as SSP;

// 
class Signals {

    // 
    private $sql_details = [];
    private $table;
    private $primaryKey ;
    private $columns = [];
    
    public function __construct()
    {
        // 
        $this->sql_details = [
            'user'=>DB_USERNAME, 
            'pass'=>DB_PASSWORD,
            'db'=>DB_NAME,
            'host'=>DB_HOST
        ];

        // 
        $this->table = "
        (
            (
                SELECT  s.*, 
                dgs.Pod_NameBg AS DGS, rdg.Pod_NameBg AS RDG, dp.Pod_NameBG AS DP,dgs.DP_ID AS dp_id, r.proveren AS proveren,r.opisanie_otchet AS otchet FROM signali AS s 
                INNER JOIN nug.podelenia AS dgs ON dgs.Pod_Id = s.pod_id 
                INNER JOIN nug.podelenia AS rdg ON rdg.Pod_Id = dgs.Glav_Pod 
                LEFT JOIN nug.podelenia AS dp ON dp.Pod_Id = dgs.DP_ID
                LEFT JOIN report as r ON s.id = r.signal_id WHERE 1 = 1 AND signaldate >= '2019-06-01' 				
            ) AS s
        ) 
      ";

        //        
        $this->primaryKey = "id";

        //
        $this->columns = [
            array( 'db' => 'id',           'dt' => 0 ),
            array( 'db' => 'signaldate',   'dt' => 1,
                    'formatter' => function( $d, $row ){
                         return date('d.m.Y H:i:s',strtotime($d));
                     }
                  ),
             array( 'db' => 'opisanie',     'dt' => 2 ),
             array( 'db' => 'DGS',          'dt' => 3 ),
             array( 'db' => 'RDG',          'dt' => 4 ),
             array( 'db' => 'otchet',       'dt' => 5 ),
             array( 'db' => 'proveren',     'dt' => 6 ),
        ];    
                
        // 
        $this->fetchSignals();
    }

    // 
    // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    private function fetchSignals() {
        echo json_encode(
           SSP::simple( $_GET, $this->sql_details, $this->table, $this->primaryKey, $this->columns) 
         );
    }
}