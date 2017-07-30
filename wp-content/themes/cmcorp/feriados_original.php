<?php

class feriados_nacionais{
function feriados(){
$dia = date("d");
$mes = date("m");

$day=date('l');


// JANEIRO
if ($dia != "01" && $mes != "01"){  echo ' diautil'; }
/*elseif ($dia == "12" && $mes == "01"){ echo "Feriado Nova York 15/01 Martin Luther Kink, Jr Day "; }
elseif ($dia == "13" && $mes == "01"){ echo "Feriado Nova York 15/01 Martin Luther Kink, Jr Day "; }
elseif ($dia == "14" && $mes == "01"){ echo "Feriado Nova York 15/01 Martin Luther Kink, Jr Day "; }
elseif ($dia == "15" && $mes == "01"){ echo "Feriado Nova York Martin Luther Kink, Jr Day "; }
elseif ($dia == "22" && $mes == "01"){ echo "Feriado BMF 25/01 Aniversario Sao Paulo "; }
elseif ($dia == "23" && $mes == "01"){ echo "Feriado BMF 25/01 Aniversario Sao Paulo"; }
elseif ($dia == "24" && $mes == "01"){ echo "Feriado BMF 25/01 Aniversario Sao Paulo"; }
elseif ($dia == "25" && $mes == "01"){ echo "Feriado BMF Aniversario de Sao Paulo "; }*/

// FEVEREIRO
elseif ($dia != "01" && $mes != "02"){  echo ' diautil'; }
/*elseif ($dia == "02" && $mes == "02"){ echo "Feriado Nova York 19/02 Washington�s Brirthday"; }
elseif ($dia == "05" && $mes == "02"){ echo "Feriado Chicago 19/02 Presidents Day"; }
elseif ($dia == "10" && $mes == "02"){ echo "Feriado Nova York 19/02 Washington�s Brirthday"; }
elseif ($dia == "11" && $mes == "02"){ echo "Feriado Chicago 19/02 Presidents Day"; }
elseif ($dia == "15" && $mes == "02"){ echo "Feriado Nova York 19/02 Washington�s Brirthday"; }
elseif ($dia == "16" && $mes == "02"){ echo "Feriado Chicago 19/02 Presidents Day"; }
elseif ($dia == "19" && $mes == "02"){ echo "Feriado Nova York Washington�s Brirthday"; }
elseif ($dia == "19" && $mes == "02"){ echo "Feriado Chicago Presidents Day"; }*/
elseif ($dia != "19" && $mes != "02"){  echo ' diautil'; }
elseif ($dia != "20" && $mes != "02"){  echo ' diautil'; }


// MAR�O
/*elseif ($dia == "01" && $mes == "03"){ echo "Sem Feriados Para Mes de Marco"; }*/
elseif ($dia != "25" && $mes != "03"){ echo ' diautil'; }


// ABRIL
/*elseif ($dia == "01" && $mes == "04"){ echo "Feriado BMF 06/04 Sexta Feira da Paixao"; }
elseif ($dia == "02" && $mes == "04"){ echo "Feriado NY 06/04 Good Friday (abre)"; }
elseif ($dia == "03" && $mes == "04"){ echo "Feriado Londres 06/04 Good Friday (abre)"; }

 elseif ($dia == "04" && $mes == "04"){ echo "Feriado BMF 06/04 Sexta Feira da Paixao"; }
 elseif ($dia == "05" && $mes == "04"){ echo "Feriado NY 06/04 Good Friday (abre)"; }
 elseif ($dia == "06" && $mes == "04"){ echo "Feriado BMF Nova York Londres"; }*/

 /*elseif ($dia == "07" && $mes == "04"){ echo "Feriado Londres 09/04 Easter Monday"; }
 elseif ($dia == "08" && $mes == "04"){ echo "Feriado Londres 09/04 Easter Monday"; }
 elseif ($dia == "09" && $mes == "04"){ echo "Feriado Londres Easter Monday"; }
 elseif ($dia == "20" && $mes == "04"){ echo "Feriado BMF 01/05 Dia Do Trabalho"; }
 elseif ($dia == "24" && $mes == "04"){ echo "Feriado BMF 01/05 Dia Do Trabalho"; }
 elseif ($dia == "25" && $mes == "04"){ echo "Feriado Londres 01/05 On Monday"; }
 elseif ($dia == "28" && $mes == "04"){ echo "Feriado Londres 01/05 On Monday"; }
 elseif ($dia == "29" && $mes == "04"){ echo "Feriado BMF 01/05 Dia Do Trabalho"; }*/
 elseif ($dia != "21" && $mes != "04"){ echo ' diautil'; }
 elseif ($dia != "23" && $mes != "04"){  echo ' diautil'; }/*"Dia de São Jorge"*/




 // MAIO
elseif ($dia != "01" && $mes != "05"){  echo ' diautil'; }
elseif ($dia != "15" && $mes != "05"){  echo ' diautil'; }
elseif ($dia != "26" && $mes != "05"){  echo ' diautil'; }/*Dia de Corpus Cristi*/ 
/*elseif ($dia == "01" && $mes == "05"){ echo "Feriado Londres Bmf"; }
elseif ($dia == "05" && $mes == "05"){ echo "Feriado Nova York 28/05 Memorial Day "; }
elseif ($dia == "15" && $mes == "05"){ echo "Feriado Nova York 28/05 Memorial Day "; }
elseif ($dia == "25" && $mes == "05"){ echo "Feriado Nova York 28/05 Memorial Day "; }
elseif ($dia == "28" && $mes == "05"){ echo "Feriado Nova York Memorial Day "; }*/





// JUNHO
/*
elseif ($dia == "01" && $mes == "06"){ echo "Feriado BMF 07/06 Corpus Christi "; }
elseif ($dia == "03" && $mes == "06"){ echo "Feriado BMF 07/06 Corpus Christi "; }
elseif ($dia == "05" && $mes == "06"){ echo "Feriado BMF 07/06 Corpus Christi "; }
elseif ($dia == "07" && $mes == "06"){ echo "Feriado BMF Corpus Christi "; }
elseif ($dia == "28" && $mes == "06"){ echo "Feriado NY 04/07 Independence Day "; }

*/
// JULHO
/*
elseif ($dia == "01" && $mes == "07"){ echo "Feriado BMF 09/07 Revolu��o Constitucion�ria "; }
elseif ($dia == "02" && $mes == "07"){ echo "Feriado NY 04/07 Independence Day "; }
elseif ($dia == "04" && $mes == "07"){ echo "Feriado NY Independence Day "; }
elseif ($dia == "05" && $mes == "07"){ echo "Feriado BMF 09/07 Revolu��o Constitucion�ria "; }
elseif ($dia == "07" && $mes == "07"){ echo "Feriado BMF 09/07 Revolu��o Constitucion�ria "; }
elseif ($dia == "09" && $mes == "07"){ echo "Feriado BMF Revolu��o Constitucion�ria "; }

*/


// AGOSTO
/*
elseif ($dia == "05" && $mes == "08"){ echo "Sem Feriados Para o Mes Agosto"; }

elseif ($dia == "28" && $mes == "08"){ echo "Feriado BMF 07/07 Independ�ncia do Brasil  "; }
*/

// SETEMBRO

/*elseif ($dia == "01" && $mes == "09"){ echo "Feriado BMF 07/07 Independ�ncia do Brasil  "; }
elseif ($dia == "03" && $mes == "09"){ echo "Feriado BMF 07/07 Independ�ncia do Brasil  "; }*/
elseif ($dia != "07" && $mes != "09"){  echo ' diautil';}



// OUTUBRO

/*elseif ($dia == "03" && $mes == "10"){ echo "Feriado BMF 12/10 Nossa Senhora Aparecida "; }

elseif ($dia == "05" && $mes == "10"){ echo "Feriado BMF 12/10 Nossa Senhora Aparecida "; }

elseif ($dia == "09" && $mes == "10"){ echo "Feriado BMF 12/10 Nossa Senhora Aparecida "; }

elseif ($dia == "01" && $mes == "10"){ echo "Feriado BMF Nossa Senhora Aparecida "; }

elseif ($dia == "27" && $mes == "10"){ echo "Feriado BMF 02/11 Finados "; }*/
elseif ($dia != "12" && $mes != "10"){  echo ' diautil'; }



// NOVEMBRO

elseif ($dia != "02" && $mes != "11"){  echo ' diautil';}
elseif ($dia != "15" && $mes != "11"){  echo ' diautil';}
/*elseif ($dia == "05" && $mes == "11"){ echo "Feriado NY 22/11 Thanksgiving Day"; }
elseif ($dia == "08" && $mes == "11"){ echo "Feriado BMF 15/11 Proclamacao da Republica "; }
elseif ($dia == "10" && $mes == "11"){ echo "Feriado BMF 20/11 Dia da Consci�ncia Negra  "; }
elseif ($dia == "11" && $mes == "11"){ echo "Feriado NY 22/11 Thanksgiving Day"; }
elseif ($dia == "12" && $mes == "11"){ echo "Feriado BMF 15/11 Proclamacao da Republica "; }
elseif ($dia == "14" && $mes == "11"){ echo "Feriado NY 22/11 Thanksgiving Day"; }
elseif ($dia == "15" && $mes == "11"){ echo "Feriado BMF Proclamacao da Republica "; }
elseif ($dia == "16" && $mes == "11"){ echo "Feriado BMF 20/11 Dia da Consci�ncia Negra  "; }
elseif ($dia == "18" && $mes == "11"){ echo "Feriado NY 22/11 Thanksgiving Day"; }
elseif ($dia == "20" && $mes == "11"){ echo "Feriado BMF Dia da Consci�ncia Negra  "; }
elseif ($dia == "22" && $mes == "11"){ echo "Feriado NY Thanksgiving Day"; }*/



// DEZEMBRO
/*
elseif ($dia == "01" && $mes == "12"){ echo "Feriado BMF NY Londres 25/12 Natal "; }
elseif ($dia == "05" && $mes == "12"){ echo "Feriado Londres 26/12 Boxing Day "; }
elseif ($dia == "10" && $mes == "12"){ echo "Feriado BMF NY Londres 25/12 Natal "; }
elseif ($dia == "11" && $mes == "12"){ echo "Feriado BMF NY Londres 31/12 Ultimo Dia do Ano "; }
elseif ($dia == "20" && $mes == "12"){ echo "Feriado BMF NY Londres 31/12 Ultimo Dia do Ano "; }
elseif ($dia == "25" && $mes == "12"){ echo "Feriado BMF NY Londres Feliz Natal "; }
elseif ($dia == "26" && $mes == "12"){ echo "Feriado Londres  Boxing Day"; }*/
elseif ($dia != "25" && $mes != "12"){  echo ' diautil'; }


else{  echo ' diautil';}

}

}
?>