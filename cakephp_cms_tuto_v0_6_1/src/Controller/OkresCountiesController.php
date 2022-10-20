<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * OkresCounties Controller
 *
 * @property \App\Model\Table\OkresCountiesTable $OkresCounties
 * @method \App\Model\Entity\OkresCounty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OkresCountiesController extends AppController {

    public function getByKrajRegion() {
        $this->Authorization->skipAuthorization();
        $kraj_region_id = $this->request->getQuery('kraj_region_id');

        $okresCounties = $this->OkresCounties->find('all', [
            'conditions' => ['OkresCounties.kraj_region_id' => $kraj_region_id],
        ]);
        $this->set('okresCounties', $okresCounties);
        $this->set('_serialize', ['okresCounties']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['KrajRegions'],
        ];
        $okresCounties = $this->paginate($this->OkresCounties);

        $this->set(compact('okresCounties'));
    }

    /**
     * View method
     *
     * @param string|null $id Okres County id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->Authorization->skipAuthorization();
        $okresCounty = $this->OkresCounties->get($id, [
            'contain' => ['KrajRegions', 'ObecCities'],
        ]);

        $this->set(compact('okresCounty'));
    }

}