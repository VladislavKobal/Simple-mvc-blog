<?php

class UserController extends Controller
{

    public function IndexAction()
    {
        $this->ListAction();
    }

    public function EditAction()
    {
        $model = $this->getModel('User');
        $this->registry['saved'] = 0;
        $this->setTitle("Особистий кабінет");
        $id = filter_input(INPUT_POST, 'id');
        if ($id) {
            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->saveItem($id, $values);
        }
        $this->setView();
        $this->renderLayout();
    }

    public function ListAction()
    {
        $this->setTitle("Новини");
        $this->registry['User'] = $this->getModel('User')->initCollection()
            ->getCollection()->select();
        $this->setView();
        $this->renderLayout();
    }

    public function RegisterAction()
    {
        $model = $this->getModel('User');
        $this->setTitle("Реєстрація");
        $id = filter_input(INPUT_POST, 'submit');
        if ($id) {
            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->add($values);
        }
        $this->setView();
        $this->renderLayout();
    }

    public function ResetAction()
    {
        $this->reset();
        header("location:" . BP . "/user/edit");

    }

    public function reset()
    {
        $cust = unserialize($_SESSION['User']);
        $arr[0] = $cust["email"];
        $arr[1] = $cust["password"];
        $customer = $this->getModel('User')->initCollection()
            ->filterlogin($arr)->getCollection()->selectFirst();
        if (!empty($customer)) {
            $_SESSION['id'] = $customer['customer_id'];
            $_SESSION['name'] = $customer['first_name'] . " " . $customer['last_name'];
            $_SESSION['user'] = true;
            unset($_SESSION['admin']);
            //setcookie("user",serialize($user), time()+3600);
            if (filter_input(INPUT_COOKIE, 'in_basket')) {
            } else {
                $_SESSION['User'] = serialize($customer);
            }
        }
    }

    public function LoginAction()
    {
        $this->setTitle("Вхід");
        if (isset($_GET)) {
            if (isset($_GET['admin'])) {
                header("location:" . BP . "/user/admin");
            }
        }
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $arr[0] = $email;
            $arr[1] = $password;
            $customer = $this->getModel('User')->initCollection()
                ->filterlogin($arr)
                ->getCollection()
                ->selectFirst();
            if (!empty($customer)) {
                $_SESSION['id'] = $customer['customer_id'];
                $_SESSION['name'] = $customer['first_name'] . " " . $customer['last_name'];
                $_SESSION['user'] = true;
                unset($_SESSION['admin']);
                //setcookie("user",serialize($user), time()+3600);
                if (filter_input(INPUT_COOKIE, 'in_basket')) {
                } else {
                    $_SESSION['User'] = serialize($customer);
                }
                header("location:" . BP . "/index/index");
                exit();
            } else {
                $this->invalid_password = 1;
            }
        }
        $this->setView();
        $this->renderLayout();
    }

    public function AdminAction()
    {
        $this->setTitle("Вхід");
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $arr[0] = $email;
            $arr[1] = $password;
            $customer = $this->getModel('admin')->initCollection()
                ->filterlogin($arr)
                ->getCollection()
                ->selectFirst();
            if (!empty($customer)) {
                $_SESSION['id'] = $customer['customer_id'];
                $_SESSION['name'] = $customer['email'];
                $_SESSION['admin'] = true;
                unset($_SESSION['user']);
                //setcookie("user",serialize($user), time()+3600);
                if (filter_input(INPUT_COOKIE, 'in_basket')) {
                } else {
                    $_SESSION['User'] = serialize($customer);
                }
                header("location:" . BP . "/index/index");
                exit();
            } else {
                $this->invalid_password = 1;
            }
        }
        $this->setView();
        $this->renderLayout();
    }

    public function LogoutAction()
    {
        echo 'hello';
        $_SESSION = [];

        // expire cookie

        if (!empty($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }
        unset($_SESSION['name']);
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        session_destroy();
        header("location:" . BP . "/index/index");
    }

}