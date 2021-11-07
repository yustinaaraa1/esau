<?php
// -----------------------------------------------------------------------------
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('datatables')) {
    function datatables($get,$aColumns) {
        $a = $get;
        $sIndexColumn = $aColumns[0];
        
        // paging
        $sLimit = "";
        if ( isset( $get['iDisplayStart'] ) && $get['iDisplayLength'] != '-1' ){
            //$sLimit = "LIMIT ".mysql_real_escape_string( $get['iDisplayStart'] ).", ".
                //mysql_real_escape_string( $get['iDisplayLength'] );
                 $sLimit = "LIMIT ".$get['iDisplayStart'].",".$get['iDisplayLength'];
        }
        
        $numbering =$get['iDisplayStart'];
        // ordering
        if ( isset( $get['iSortCol_0'] ) ){
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $get['iSortingCols'] ) ; $i++ ){
                if ( $get[ 'bSortable_'.intval($get['iSortCol_'.$i]) ] == "true" ){
                    $sOrder .= $aColumns[ intval( $get['iSortCol_'.$i] ) ]."
                        ".$get['sSortDir_'.$i].", ";
                }
            }
            
            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY  $aColumns[0]
                        ASC" ){
                $sOrder = "ORDER BY $aColumns[0] DESC";
            }
        }
        // filtering
        $sWhere = "";
        if ( $get['sSearch'] != "" ){
            $sWhere = " (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                $sWhere .= $aColumns[$i]." LIKE '%".$get['sSearch']."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }else{
            $sWhere ="1";
        }
        if (isset($get['sDateStartSearch'])) {
            $starta=explode('-', $get['sDateStartSearch']);
            $start=$starta[2]."-".$starta[1]."-".$starta[0];
            $get['sDateEndSearch']=explode('-', $get['sDateEndSearch']);
            $end=$get['sDateEndSearch'][2]."-".$get['sDateEndSearch'][1]."-".$get['sDateEndSearch'][0];
            $sWhere .= ' AND ('.$aColumns[$get['sDateColSearch']]." BETWEEN '".$start."' AND '".$end."')";
        }
        
        // individual column filtering
        for ( $i=0 ; $i<count($aColumns) ; $i++ ){
            if(isset($get['bSearchable_'.$i])){
            if ( $get['bSearchable_'.$i] == "true" && $get['sSearch_'.$i] != '' ){
                if ( $sWhere == "" ){
                    $sWhere = "WHERE ";
                }
                else{
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i]." LIKE '%".$get['sSearch_'.$i]."%' ";
            }
            }
        }
        $aColumnsStr = '';
        foreach ($aColumns as $key) {
            $aColumnsStr .=$key.',';
        }
        $aColumnsStr = substr_replace($aColumnsStr, "", -1);
        $data = array(
            'sLimit' => $sLimit,
            'numbering' => $numbering,
            'sOrder' => $sOrder,
            'sWhere' => $sWhere,
            'aColumnsStr'=>$aColumnsStr,
            );
           return $data;
    }
}