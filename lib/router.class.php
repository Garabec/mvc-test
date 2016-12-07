<?php



class Router {
    
    private $uri;
    private $controller;
    private $action;
    private $params;
    /**
     * @return mixed
     */
    protected $route;
    protected $method_prefix;
    protected $language; 
     
     
     
     public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }
     
     
     
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
      
    
   public function __construct($uri){
        
   $this->uri=urldecode(trim($uri,'/')); 
   
   
   $routes=Config::get('routes');
   $this->route=Config::get('default_routes');
   $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '' ;
   $this->controller=Config::get('default_conroller');
   $this->language=Config::get('default_languages');
   $this->action=Config::get('defualt_action');
   
   $uri_part=preg_split("/[\/?\??]/",$this->uri);
   
   
   
   
   
   if(count($uri_part)){
       
      
     
     
       
   if (in_array(strtolower(current($uri_part)),array_keys($routes))){
       
      
       
    $this->route=strtolower(current($uri_part));
    $this->method_prefix= isset($routes[$this->route]) ? $routes[$this->route] : '' ;
    array_shift($uri_part);
       
   }elseif(in_array(strtolower(current($uri_part)),Config::get('languages'))) {
       
     $this->language=strtolower(current($uri_part));  
      array_shift($uri_part); 
       
   }
   
   if(current($uri_part)) {
       
       $this->controller=strtolower(current($uri_part));  
        array_shift($uri_part); 
    } 
   
   if(current($uri_part)) {
       
       $this->action=strtolower(current($uri_part));  
        array_shift($uri_part); 
    } 
   
   
   $this->params=$uri_part;
   
   
   
       
   }
       
   
   
   
   
       
   }
   
  
      
      
      
        
    
     
   
   
   
   
   
    
    
}