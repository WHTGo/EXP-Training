<?php

class ProductController extends VanillaController
{
    function beforAction()
    {

    }


    function view($id = null)
    {
        $this->Product->id = $id;
        $this->Product->showHasOne();
        $this->Product->showHasMany();
        $product = $this->Product->search();
        $this->set('product',$product);
    }

    function afterAction()
    {

    }
}