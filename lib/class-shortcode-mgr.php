<?php
class Shortcode_Mgr
{

    public function __construct()
    {
    }

    public function squoze_add_category($attr, $content)
    {
        $defaults = array
        (
            'title'     => null,
            'style'     => null,
            'class'     => null,
        );
        
        $args = shortcode_atts($defaults, $attr);
        
        $view = squoze_get_view('category.phtml', $args, $content);
        
        return $view;

    }

    public function squoze_add_item($attr, $content)
    {
        $defaults = array
        (
            'style' => null,
            'class' => null,
            'showprice' => 'true',
        );
        
        $args = shortcode_atts($defaults, $attr);
        
        $view = squoze_get_view('item.phtml', $args);
        
        return $view;
    }

}
