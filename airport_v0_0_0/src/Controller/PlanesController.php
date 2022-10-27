<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Planes Controller
 *
 * @property \App\Model\Table\PlanesTable $Planes
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanesController extends AppController
{

    public function initialize(): void
    {
        $this->viewBuilder()->setLayout('cakephp_default');
        parent::initialize();
        $this->Authorization->skipAuthorization();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $planes = $this->paginate($this->Planes);

        $this->set(compact('planes'));
    }

    /**
     * View method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => ['Reservations'],
        ]);

        $this->set(compact('plane'));
    }
}
