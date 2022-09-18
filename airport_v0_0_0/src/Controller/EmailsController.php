<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Mailer;

class EmailsController extends AppController
{
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $email = new Mailer('default');
        $email->setTo('william4800@hotmail.com')
            ->setSubject('With Cake\Mailer')
            ->deliver('My message with mailer');
    }
}
