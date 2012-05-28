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
        $postType = get_post_type($pageId);
        
        if ($postType != 'page')
        {
            $args = array(
                    'post_type' => $postType,
                    'p' => $pageId
                    );
        }
        else
        {
            $args = array('page_id' => $pageId);
        }
        
        
        query_posts($args);
        
        $tpl = get_post_meta($pageId, '_wp_page_template', true);
        
        if ($tpl === 'default') {
            $tpl = 'page.php';
        }
    }
    
    private function getCurrentDomain()
    {
        return $_SERVER["HTTP_HOST"];
    }
}