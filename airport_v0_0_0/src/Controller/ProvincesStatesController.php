<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProvincesStates Controller
 *
 * @property \App\Model\Table\ProvincesStatesTable $ProvincesStates
 * @method \App\Model\Entity\ProvincesState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvincesStatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Countries'],
        ];
        $provincesStates = $this->paginate($this->ProvincesStates);

        $this->set(compact('provincesStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Provinces State id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provincesState = $this->ProvincesStates->get($id, [
            'contain' => ['Countries'],
        ]);

        $this->set(compact('provincesState'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provincesState = $this->ProvincesStates->newEmptyEntity();
        if ($this->request->is('post')) {
            $provincesState = $this->ProvincesStates->patchEntity($provincesState, $this->request->getData());
            if ($this->ProvincesStates->save($provincesState)) {
                $this->Flash->success(__('The provinces state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provinces state could not be saved. Please, try again.'));
        }
        $countries = $this->ProvincesStates->Countries->find('list', ['limit' => 200])->all();
        $this->set(compact('provincesState', 'countries'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Provinces State id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provincesState = $this->ProvincesStates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provincesState = $this->ProvincesStates->patchEntity($provincesState, $this->request->getData());
            if ($this->ProvincesStates->save($provincesState)) {
                $this->Flash->success(__('The provinces state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provinces state could not be saved. Please, try again.'));
        }
        $countries = $this->ProvincesStates->Countries->find('list', ['limit' => 200])->all();
        $this->set(compact('provincesState', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Provinces State id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provincesState = $this->ProvincesStates->get($id);
        if ($this->ProvincesStates->delete($provincesState)) {
            $this->Flash->success(__('The provinces state has been deleted.'));
        } else {
            $this->Flash->error(__('The provinces state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
