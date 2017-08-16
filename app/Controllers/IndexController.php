<?php

//namespace Robofake\Controllers;


class IndexController extends ControllerBase
{
    
    public function indexAction()
    {
        
        $this->session->set('query', $this->request->getQuery());
        
        echo '<pre>', print_r($this->session->get('query', [])), '</pre>';
        die();
    }
    
    public function payAction()
    {
        return __METHOD__;
    }
    
}

