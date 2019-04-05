<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Itemtype Controller
 *
 * @property \App\Model\Table\ItemtypeTable $Itemtype
 *
 * @method \App\Model\Entity\Itemtype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemtypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $itemtype = $this->paginate($this->Itemtype);

        $this->set(compact('itemtype'));
    }

    /**
     * View method
     *
     * @param string|null $id Itemtype id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemtype = $this->Itemtype->get($id, [
            'contain' => []
        ]);

        $this->set('itemtype', $itemtype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemtype = $this->Itemtype->newEntity();
        if ($this->request->is('post')) {
            $itemtype = $this->Itemtype->patchEntity($itemtype, $this->request->getData());
            if ($this->Itemtype->save($itemtype)) {
                $this->Flash->success(__('The itemtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itemtype could not be saved. Please, try again.'));
        }
        $this->set(compact('itemtype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itemtype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemtype = $this->Itemtype->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemtype = $this->Itemtype->patchEntity($itemtype, $this->request->getData());
            if ($this->Itemtype->save($itemtype)) {
                $this->Flash->success(__('The itemtype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itemtype could not be saved. Please, try again.'));
        }
        $this->set(compact('itemtype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itemtype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemtype = $this->Itemtype->get($id);
        if ($this->Itemtype->delete($itemtype)) {
            $this->Flash->success(__('The itemtype has been deleted.'));
        } else {
            $this->Flash->error(__('The itemtype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
