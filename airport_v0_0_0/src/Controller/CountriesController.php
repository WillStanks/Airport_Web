<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('cakephp_default');
        $this->Authorization->skipAuthorization();
        $countries = $this->Countries->find('all')->all();
        //$countries = $this->paginate($this->Countries);

        $this->set(compact('countries'));
        $this->viewBuilder()->setOption('serialize', ['countries']);
        $this->viewBuilder()->setLayout('countriesSpa');
    }

    public function indexBaked()
    {
        $this->Authorization->skipAuthorization();
        $countries = $this->paginate($this->Countries);

        $this->set(compact('countries'));
    }

    /**
     * View method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $country = $this->Countries->get($id, [
            'contain' => ['ProvincesStates'],
        ]);

        $this->set(compact('country'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $country = $this->Countries->newEmptyEntity();
        if ($this->request->is('post')) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $this->set(compact('country'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $country = $this->Countries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            if ($this->Countries->save($country)) {
                $this->Flash->success(__('The country has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The country could not be saved. Please, try again.'));
        }
        $this->set(compact('country'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
