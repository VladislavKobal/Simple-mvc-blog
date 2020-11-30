<?php

class MessageController extends Controller
{

    public function ProductAction()
    {
        $this->ListAction();
    }

    public function ListAction()
    {
        $this->setTitle("Новини");
        if (filter_input(INPUT_POST, 'search')) {
            $this->registry['messages'] = $this->getModel('Message')->initCollection()
                ->getCollection()
                ->selectFirst();
        } else {
            $this->registry['messages'] = $this->getModel('Message')->initCollection()->getCollection()->select();
        }
        $this->setView();
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $model = $this->getModel('Message');
        $this->registry['saved'] = 0;
        $this->setTitle("Видалення повідомлення");
        $id = filter_input(INPUT_GET, 'id');
        if (filter_input(INPUT_POST, 'submit')) {
            $this->registry['saved'] = 1;
            $model->deleteItem($id);
        }
        $this->registry['message'] = $model->getItem($this->getId());
        $this->setView();
        $this->renderLayout();
    }

    public function addAction()
    {
        $model = $this->getModel('Message');
        $this->registry['saved'] = 0;
        $this->setTitle("Додавання новини");
        $id = filter_input(INPUT_POST, 'submit');
        if ($id) {

            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->add($values);
        }
        $this->setView();
        $this->renderLayout();
    }

    public function getId()
    {
        return filter_input(INPUT_GET, 'id');
    }


}