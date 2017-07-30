<?php
class FeriadoService {
    
   function isDiaUtil($data){
      $segundosNumDia = 86400;
      $diaDaSemana = date('l', $data);
      $datas = array();
      $datas['pascoa'] = easter_date(date('Y', $data));
      $datas['sexta_santa'] = $datas['pascoa'] - (2 * $segundosNumDia);
      $datas['vesperaCarnaval'] = $datas['pascoa'] - (46 * $segundosNumDia);
      $datas['carnaval'] = $datas['pascoa'] - (47 * $segundosNumDia);
      $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $segundosNumDia);
      $feriados = array (
            '01/01',
            date('d/m',$datas['vesperaCarnaval']),
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04',
            '01/05',
            date('d/m',$datas['corpus_cristi']),
            '12/10',
            '02/11',
            '15/11',
            '25/12',
      );
      
      if($diaDaSemana == 'Saturday' or $diaDaSemana == 'Sunday') {
          return false;
      }
      
      foreach($feriados as $feriado) {
          if(date('d/m', $data) == $feriado) {
              return false;
          }
      }
      
      return true;
   }
}
?>