<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Turmas Controller
 *
 * @property \App\Model\Table\TurmasTable $Turmas
 *
 * @method \App\Model\Entity\Turma[] paginate($object = null, array $settings = [])
 */
class TurmasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teachers', 'Subjects']
        ];
        $turmas = $this->paginate($this->Turmas);

        $this->set(compact('turmas'));
        $this->set('_serialize', ['turmas']);
    }

    /**
     * View method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turma = $this->Turmas->get($id, [
            'contain' => ['Teachers', 'Subjects']
        ]);

        $this->set('turma', $turma);
        $this->set('_serialize', ['turma']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turma = $this->Turmas->newEntity();
        if ($this->request->is('post')) {
            $turma = $this->Turmas->patchEntity($turma, $this->request->getData());
            if ($this->Turmas->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turma could not be saved. Please, try again.'));
        }
        $teachers = $this->Turmas->Teachers->find('list', ['limit' => 200]);
        $subjects = $this->Turmas->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('turma', 'teachers', 'subjects'));
        $this->set('_serialize', ['turma']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turma = $this->Turmas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turma = $this->Turmas->patchEntity($turma, $this->request->getData());
            if ($this->Turmas->save($turma)) {
                $this->Flash->success(__('The turma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turma could not be saved. Please, try again.'));
        }
        $teachers = $this->Turmas->Teachers->find('list', ['limit' => 200]);
        $subjects = $this->Turmas->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('turma', 'teachers', 'subjects'));
        $this->set('_serialize', ['turma']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Turma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turma = $this->Turmas->get($id);
        if ($this->Turmas->delete($turma)) {
            $this->Flash->success(__('The turma has been deleted.'));
        } else {
            $this->Flash->error(__('The turma could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
