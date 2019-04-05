<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Item Controller
 *
 * @property \App\Model\Table\ItemTable $Item
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $item = $this->paginate($this->Item);

        $this->set(compact('item'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Item->get($id, [
            'contain' => []
        ]);

        $this->set('item', $item);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $item = $this->Item->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Item->patchEntity($item, $this->request->getData());
            if ($this->Item->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $this->set(compact('item'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Item->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Item->patchEntity($item, $this->request->getData());
            if ($this->Item->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $this->set(compact('item'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Item->get($id);
        if ($this->Item->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //DBからItemを取得するAPI
    public function getItems(){
        //テンプレート不要
        $this->autoRender = false;

        $this->loadModel("User");

        $userQuery = $this->User->find('all')->order(['UserId'=>'DESC'])->ToArray();
        
        //UserIdが新しい順にsequenceID = 1のsequenceを３回分取得
        $itemSequences = array();
        $userCount = 0;
        for($i = 0; $i < 3; $i++){
            $itemSequences[$i] = null;
            while($itemSequences[$i] == null){
                $itemSequences[$i] = $this->Item->find('all')
                                                ->where(['UserId'=>$userQuery[$userCount]['UserId']])
                                                ->where(['SequenceId'=>1])
                                                ->order(['ItemId'=>'ASC'])
                                                ->ToArray();
                $userCount++;
            }
        }
        
        $json = json_encode($itemSequences);
        //jsonファイルのサイズが大きいため、bodyに入れて渡す
        return $this->response->withStringBody($json);
    }

    /*
    リクエストURL : http://localhost/torch/item/setItem/
    パラメータ :    
                name        =>名前　vatchar
                totalSeq    =>sequenceの数 int
                seq1        =>SequenceData json
                                =>switchId (不要)
                                =>itamData　複数
                                    =>  time int 
                                        XCoordinate double
                                        YCoordinate double
                                        ZCoordinate double
                                        itemType int(1:torch, 2:deadpoint, 3:exit)
                                        stageId int(1: , 2: , 3: )

                seq2        =>（以下同じ）
                seq3
                seq4
                seq5
    */
    //DBにItemを格納するAPI
    public function setItem(){
        

        //テンプレート不要
        $this->autoRender = false;

        //他テーブルの読み込み
        $this->loadModel('User');
        $this->loadModel('ItemType');
        $this->loadModel('Stage');

        //リクエストデータの読み込み
        $userName = "";
        if(isset($this->request->data['name'])){
            $userName = $this->request->data['name'];
        }
        $totalSequenceNumber = 0;
        if(isset($this->request->data['totalSeq'])){
            $totalSequenceNumber = $this->request->data['totalSeq'];
        }
        $jsonSeq = array();
        for($i = 0; $i < 5; $i++){
            $jsonSeq[$i] = null;
            if(isset($this->request->data['seq'.(string)($i+1)])){
                $jsonSeq[$i] = $this->request->data['seq'.(string)($i+1)];
            }
        }

        //jsonデコード
        $seqArray = array();
        for($i = 0; $i < 5; $i++){
            $seqArray[$i] = null;
            if(isset($jsonSeq[$i])){
                $seqArray[$i] =  json_decode($jsonSeq[$i], true);
            }
        }

        //userテーブルにデータセット
        $userData = array(  "Name"          => $userName,
                            "Date"          => date('Y/m/d H:i:s'),
                            "TotalSequence" => $totalSequenceNumber                    
                        );
        $userRecord = $this->User->newEntity();
        $userRecord = $this->User->patchEntity($userRecord, $userData);
        //saveしてからuserId（AI）の取得
        if( $this->User->save($userRecord)){
            echo "ユーザー登録成功"; //成功
            $userId = $userRecord->UserId;
        }else{
            echo "ユーザー登録失敗"; //失敗
            $userId = 0;
        }

        //Itemテーブルに登録するデータの整形  
        $itemData = array();
        $sequenceCount = 1;
        foreach($seqArray as $seq){
            if($seq){
                foreach($seq as $itemOne){
                    $itemData[] = array("ItemType" => $itemOne["itemType"],
                                        "UserId" => $userId,
                                        "SequenceId" => $itemOne["sequenceId"],
                                        "stageId" => $itemOne["stageId"],
                                        "Time" => $itemOne["time"],
                                        "XCoordinate" => $itemOne["xCoordinate"],
                                        "YCoordinate" => $itemOne["yCoordinate"],
                                        "ZCoordinate" => $itemOne["zCoordinate"]);
                }
            }
            $sequenceCount++;
        }

        //データがあったことを確認して登録
        if(!empty($itemData)){
            
            $records = $this->Item->newEntities($itemData);

            foreach($records as $record){
                if($this->Item->save($record)){
                    echo "itemを登録しました";
                }else{
                    echo "itemを登録できませんでした";
                }
            }
        }else{
            echo "データがありません";
        }
        
    }
}
