<?php

class IndexController extends Controller
{

    public function IndexAction()
    {
        $this->setTitle("Test");
        $this->setView();
        $this->renderLayout();
    }

    public function TestAction()
    {
        $this->setTitle("TestAction");
        $this->setView();
        $this->renderLayout();

    }

}