<?php



require_once(ROOT.DS.'config'.DS.'config.php'); 




function __autoload($className){
    
  $lib_path=ROOT.DS.'lib'.DS.strtolower($className).'.class.php' ;
 
  
  
  $controllers_path=ROOT.DS.'controllers'.DS.str_replace('controller','',strtolower($className)).'.controller.php';
  
  
  
  $model_path=ROOT.DS.'model'.DS.strtolower($className).'.php';
  
  
   if(file_exists($lib_path)){
      
   require_once($lib_path); }
   
   elseif(file_exists($controllers_path)){
      
   require_once($controllers_path); }
   
   elseif(file_exists($model_path)){
      
   require_once($model_path); }
   else{ throw new Exception("File class not found ".$className);
       
       
   }
  
    
   
    
    
}