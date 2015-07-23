<?php
Class Building{

    private $parms      = null;   
    private $keywords   = ['__halt_compiler', 'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch', 'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do', 'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach', 'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final', 'for', 'foreach', 'function', 'global', 'goto', 'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof', 'interface', 'isset', 'list', 'namespace', 'new', 'or', 'print', 'private', 'protected', 'public', 'require', 'require_once', 'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use', 'var', 'while', 'xor'];

    public function __construct($argv)
    {
        $this->parms    = $argv;   
        $arr_activity   = array('new', 'help', 'h'); 
        $arr_option     = array('app','controller','model','views','view_list','view_form'); 
            
        $activity       = filter_var(@$argv[1], FILTER_SANITIZE_STRING);
        $option         = filter_var(@$argv[2], FILTER_SANITIZE_STRING);
        $name           = filter_var(@$argv[3], FILTER_SANITIZE_STRING);

        if(!count($this->parms))
        { 
            echo "<h3>build only runs on the terminal</h3>";
        }else if( count($this->parms)===1 )        
        {   
            self::help();
        }else if(in_array($activity, $arr_activity))
        {
            if($activity=='help' || $activity=='h')
            {   
                self::help();
                return false;
            }
            if(in_array($option, $arr_option))
            {

                if($name){

                    if(in_array($name, $this->keywords))
                    {
                        self::term('jump',1);    
                        self::message('........................Error name ['.$name.'] this word reserved ........................','light_red');   
                        self::term('jump',2);  
                        return false;   
                    }

                    switch ($option) {
                        case 'app':  
                            $this->new_model($name);
                            $this->new_controller($name);
                            $this->new_views($name);
                            break;
                        case 'model':
                            $this->new_model($name);
                            break;  
                        case 'controller':  
                            $this->new_controller($name);
                            break;  
                        case 'views':    
                            $this->new_views($name);
                            break;
                        case 'view_list':
                            $this->new_view_list($name);
                            break;
                        case 'view_form':
                            $this->new_view_form($name);
                            break;
                    }   
                }else{  
                    self::term('jump',2);
                    self::message('........................Error option ['.$option.'] no have name........................','light_red');   
                    self::term('jump',2); 
                }
            }else if($option)
            {
                self::term('jump',2);   
                self::message('........................Error option ['.$option.']........................','light_red');   
                self::term('jump',2);  
            }else{
                self::term('jump',2);
                self::message('........................Error option not selected........................','light_red');   
                self::term('jump',2);
            }
        }else{
            self::term('jump',2);
            self::message('........................Error activity ['.$activity.']........................','light_red');   
            self::term('jump',2);   
        }
    }
    
    public function help()
    {


        self::term('jump',2);    
        self::message('........................Available commands........................','white');   
        self::term('jump',2);   
        
        /*
        *   app[scaffolding complete]
        */  
        self::message(' new','light_green');    self::term('tab');
        self::message('app','green');           self::term('tab',2);
        self::message('name','cyan');           self::term('tab',2);
        self::message(' Generate controller, model and views','light_gray');
        self::term('jump');
        /*
        *   controller[controller complete]
        */
        self::message(' new','light_green');        self::term('tab');
        self::message('controller','green');        self::term('tab');
        self::message('name','cyan');               self::term('tab',2); 
        self::message(' Generate controller and utils','light_gray');
        self::term('jump');  
        /*
        *   model[model complete]
        */      
        self::message(' new','light_green');        self::term('tab');
        self::message('model','green');             self::term('tab',2);  
        self::message('name','cyan');               self::term('tab',2);   
        self::message(' Generate model and utils','light_gray');
        self::term('jump');
        /*
        *   views[views complete]
        */  
        self::message(' new','light_green');    self::term('tab');
        self::message('views','green');         self::term('tab',2);  
        self::message('name','cyan');           self::term('tab',2);
        self::message(' Generate views foldername / list and form','light_gray');
        self::term('jump');
        
        /*
        *   view[view form complete]
        */      
        self::message(' new','light_green');        self::term('tab');
        self::message('view_form','green');         self::term('tab');  
        self::message('name|folder/name','cyan');   //self::term('tab');   
        self::message(' Generate view form','light_gray');
        self::term('jump');
        /*
        *   view[view list complete]
        */      
        self::message(' new','light_green');        self::term('tab');
        self::message('view_list','green');         self::term('tab');  
        self::message('name|folder/name','cyan');   //self::term('tab');   
        self::message(' Generate view list ','light_gray');
        self::term('jump');
    }           

    private function message( $str , $color = 'black'   )
    {
            
        $color_text['black']        = '0;30';
        $color_text['dark_gray']    = '1;30';
        $color_text['blue']         = '0;34';
        $color_text['light_blue']   = '1;34';
        $color_text['green']        = '0;32';
        $color_text['light_green']  = '1;32';
        $color_text['cyan']         = '0;36';
        $color_text['light_cyan']   = '1;36';
        $color_text['red']          = '0;31';
        $color_text['light_red']    = '1;31';
        $color_text['purple']       = '0;35';
        $color_text['light_purple'] = '1;35';
        $color_text['brown']        = '0;33';
        $color_text['yellow']       = '1;33';
        $color_text['light_gray']   = '0;37';
        $color_text['white']        = '1;37';

        echo "\033[". $color_text[$color]."m".$str."\033[0m";
    }

    private function new_model($name )
    {
        
        $names  = $this->_names( $name );  
        $file_controller = APPPATH.'models/'.$names['{{MODEL_FILE}}'].'.php';
        if(file_exists($file_controller))
        {
            self::message(' Model already exists in the application/models/'.$name.' directory.','red');
            self::term('jump',2);
            return false;   
        }else
        {   
            $this->_save_file(   
                            $file_controller, 
                            $this->_get_content_and_replace( 'model_template.txt', $names ) 
                        );
        }   
            
        self::message(' Model ','light_green');
        self::message( $name ,'white');
        self::message(' was created','light_green');
        self::term('jump');   
    } 

    private function new_controller(  $name )
    {
        $names  = $this->_names( $name );
        $file_controller = APPPATH.'controllers/'.$names['{{CONTROLLER}}'].'.php';
        if(file_exists($file_controller))
        {         
            self::message(' Controller already exists in the application/controllers/'.$name.' directory.','red');
            self::term('jump',2);
            return false;
        }else
        {           
            $this->_save_file(   
                            $file_controller, 
                            $this->_get_content_and_replace( 'controller_template.txt', $names ) 
                        );
                
        }   

        self::message(' Controller ','light_green');
        self::message( $name ,'white');
        self::message(' was created','light_green');
        self::term('jump'); 
    }   

    private function new_views($name)
    {

    	$names  = $this->_names( $name );

        $file_list = APPPATH.'views/'.$names['{{VIEW_LIST}}'].'.php';
        $file_form = APPPATH.'views/'.$names['{{VIEW_FORM}}'].'.php';
       	$dir 	   = APPPATH.'views/'.strtolower($name).'/';

        if(file_exists($file_list) || file_exists($file_form)  )
        {           
            self::message(' Views already exists in the application/views/'.$names['{{VIEW_LIST}}'].'.php or application/views/'.$names['{{VIEW_FORM}}'].'.php  directory.','red');
            self::term('jump',2);
            return false;	
        }else
        {       
        	$create_dir   = (!file_exists($dir) ) ? mkdir( $dir , 0777, true) : FALSE;

			$this->_save_file(   
                            $file_list, 
                            $this->_get_content_and_replace( 'view_list_template.txt', $names ) 
                        );
            $this->_save_file(
                            $file_form, 
                            $this->_get_content_and_replace( 'view_form_template.txt', $names ) 
                        );
        } 

        self::message(' Views ','light_green');  
        self::message( $name ,'white');
        self::message(' was created','light_green');
        self::term('jump');   
    } 

    private function new_view_list($name)
    {
        $names = $this->_names( $name );

        $names['{{VIEW_LIST}}'] =  strtolower($name);

        $route = explode("/",$name); 
        
        if(count($route)>1)
        {           
            $dir        = APPPATH.'views/'.strtolower($route[0]).'/';    
        }
        else
        {
            $dir        = FALSE;
        }       

        $file_list  = APPPATH.'views/'.$names['{{VIEW_LIST}}'].'.php';

        if(file_exists($file_list)  )
        { 
            self::message(' View List already exists in the application/views/'.$names['{{VIEW_LIST}}'].'.php directory.','red');
            self::term('jump',2);
            return false;   
        }
        else
        {
            if($dir)
            {   
                if (!file_exists($dir) )
                { 
                    mkdir( $dir , 0777, true); 
                }    
            }   
            
            $this->_save_file(   
                            $file_list, 
                            $this->_get_content_and_replace( 'view_list_template.txt', $names ) 
                        );
        } 

        self::message(' Views ','light_green');  
        self::message( $name ,'white');
        self::message(' was created','light_green');
        self::term('jump');   
    } 

    private function new_view_form($name)
    {
        $names                  = $this->_names( $name );
        $names['{{VIEW_FORM}}'] =  strtolower( $name );
            
        $route = explode("/",$name); 
        if(count($route)>1)
        {           
            $dir = APPPATH.'views/'.strtolower($route[0]).'/';
        }
        else
        {   
            $dir = FALSE;
        } 

        $file_list  = APPPATH.'views/'.$names['{{VIEW_FORM}}'].'.php';

        if(file_exists($file_list)  )
        {   
            self::message(' View form already exists in the application/views/'.$names['{{VIEW_FORM}}'].' directory.','red');
            self::term('jump',2);
            return false;       
        }
        else
        {
            if($dir)
            {   
                if (!file_exists($dir) )
                {   
                    mkdir( $dir , 0777, true); 
                }    
            }       
            //self::message("mi route [{$file_list}]",'light_green');  
            //return false;
            $this->_save_file(
                            $file_list,
                            $this->_get_content_and_replace( 'view_form_template.txt', $names ) 
                        );
        } 

        self::message(' Views ','light_green');  
        self::message( $name ,'white');
        self::message(' was created','light_green');
        self::term('jump');   
    } 

    private function term( $type , $number = 1 )
    {
        $arr_type['tab']    = "\t";
        $arr_type['jump']   = "\n";
        $terminal = ''; 
        for($i = 0; $i<$number ; $i++)
        {   
            $terminal.=$arr_type[$type];
        }
        echo $terminal;
    }
    
    private function _names($str)  
    {   
        $strtolower                   = strtolower($str);
        $user                         = posix_getpwuid( posix_geteuid() );
        $names['{{CONTROLLER}}']      = ucfirst( $strtolower );
        $names['{{CONTROLLER_NAME}}'] = $strtolower;    
        $names['{{MODEL_FILE}}']      = ucfirst($strtolower)."_model";
        $names['{{MODEL_TABLE}}']     = $strtolower;
        $names['{{MODEL}}']           = ucfirst($strtolower)."_model"; 
        			
        $names['{{VIEW_FORM}}']       = $strtolower."/view-form-".$strtolower;
        $names['{{VIEW_LIST}}']       = $strtolower."/view-list-".$strtolower;

        $names['{{DATE}}']            = date('d F, Y');
        $names['{{USER}}']            = $user['name'];

        return $names;  
    }

    private function _save_file( $file, $str )
    {
        $fp = fopen( $file , "w");
        fputs($fp, $str);
        fclose($fp);        
    }  

    private function _get_content_and_replace( $file, $replace_names )
    {
        $f = file_get_contents('template/'. $file );
        return strtr($f,$replace_names);
    }         

}   
    
if(php_sapi_name()==='cli')
{       
    $parms = (isset($argv)) ? $argv : null;         
    $B     = new Building($parms);
}else
{   
    echo "<h3>build only runs on the terminal</h3>";
}
