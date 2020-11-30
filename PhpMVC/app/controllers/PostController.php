<?php

class PostController extends Controller
{

    public function ProductAction()
    {
        $this->ListAction();
    }

    public function ListAction()
    {
        $this->setTitle("Новини");
        $currentPage = 1;
        if (filter_input(INPUT_GET, 'page') == TRUE) {
            $currentPage = intval(filter_input(INPUT_GET, 'page'));
        }


        $items = $this->getModel('Post')->initCollection()->paginate($currentPage);
        $this->registry['total_rows'] = $items->total_rows[0]["COUNT(*)"];
        $this->registry['total_pages'] = $items->total_pages;
        $this->registry['page'] = $currentPage;
        $this->registry['products'] = $items->getCollection()->select();

        $this->setView();
        $this->renderLayout();
    }

    public function editAction()
    {
        $model = $this->getModel('Post');
        $this->registry['saved'] = 0;
        $this->setTitle("Редагування новини");
        $id = filter_input(INPUT_POST, 'id');
        if ($id) {

            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->saveItem($id, $values);
        }
        $this->registry['Post'] = $model->getItem($this->getId());
        $this->setView();
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $model = $this->getModel('Post');
        $this->registry['saved'] = 0;
        $this->setTitle("Видалення новини");
        $id = filter_input(INPUT_GET, 'id');
        if (filter_input(INPUT_POST, 'submit') == TRUE) {

            $this->registry['saved'] = 1;
            $model->deleteItem($id);
        }
        $this->registry['Post'] = $model->getItem($this->getId());
        $this->setView();
        $this->renderLayout();
    }

    public function addAction()
    {
        $model = $this->getModel('Post');
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
        /*
        if (isset($_GET['id'])) {
         
            return $_GET['id'];
        } else {
            return NULL;
        }
        */
        return filter_input(INPUT_GET, 'id');
    }


}