<?php 
if (! function_exists('pdf_to_img'))
{
  function pdf_to_img($pdf,$extraction_path)
  {

    // exec("'gs' -o reso/file-%06d.png -dFIXEDMEDIA=true -dSAFER -dBATCH -dNOPAUSE -sDEVICE=jpeg -dPDFFitPage=true -dUseCropBox=true -dJPEGQ=100 -r100 -dTextAlphaBits=4 '$pdf'",$output);
  // var_dump($output);
  	if (!is_dir($extraction_path)) {
    mkdir($extraction_path,0777, TRUE);
}
  exec("'gs' -o $extraction_path/%d.png -dFIXEDMEDIA=true -dSAFER -dBATCH -dNOPAUSE -sDEVICE=png16m -dPDFFitPage=true -dUseCropBox=true -dJPEGQ=100 -r100 -dTextAlphaBits=4 '$pdf'",$output);
  // var_dump($output);
  if(!empty($output)) return (true);
  else return false;
  }
}

?>