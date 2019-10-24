<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->users = Users::find();
    }

    public function addAction()
    {
    	$user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
            	"id",
                "name",
                "email",
            ]
        );

        if ($success) {
            // echo "<script>alert('Data berhasil disimpan!');window.location.href='/test-phalcon/public/index';</script>";
            $this->response->redirect("index");
        } else {
            echo "<script>alert('Maaf lengkapi data terlebih dahulu!');window.location.href='/test-phalcon/public/add';</script>";
        }
    }

    public function delAction($id)
    {
    	$user = new Users();
    	$data = $user->findFirst($id);
        if($data->delete()){
        	$this->response->redirect("index");
        }
    }
}