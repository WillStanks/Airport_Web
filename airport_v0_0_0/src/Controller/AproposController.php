<?php

namespace App\Controller;

use App\Controller\AppController;


class AproposController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('cakephp_default');
        $this->Authorization->skipAuthorization();
        $this->set(null);
    }
}
