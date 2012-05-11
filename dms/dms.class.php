<?php
class DMS
{
    private $domain;
    private $map    = array();
    
    public function run()
    {
        if (!is_admin()) {
            
            $this->generateMap();
            $this->domain    = $this->getCurrentDomain();
           
            if (!empty($this->map[$this->domain]))
            {
                $this->displayPage($this->map[$this->domain]);
                
                $this->kill();
            }
        }
    }
    
    private function generateMap()
    {
        $string = get_option('dms_map');
        parse_str($string, $map);
        
        
        foreach ($map as $key => $value)
        {
            $key = str_replace('_', '.', $key);
            $this->map[$key] = $value;
        }
    }
    
    private function displayPage($pageId)
    {
        $page = get_page($pageId);
        $tpl = get_post_meta($pageId, '_wp_page_template', true);
        include(TEMPLATEPATH . '/' . $tpl);
    }
    
    private function getCurrentDomain()
    {
        return $_SERVER["HTTP_HOST"];
    }
    
    private function kill()
    {
        exit(0);
    }
}