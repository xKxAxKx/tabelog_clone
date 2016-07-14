<?php

class ShopsController extends AppController{


  public $helpers = ['Shop'];

  public $components = [
    'Paginator' =>['limit' => 10, 'order' =>['created' => 'desc']]
  ];

  //最初に見に行くアクション
  public function beforeFilter(){
    parent::beforeFilter();

    $this->Auth->allow('index','view');
  }

  public function index(){
    //$this->set('shops', $this->Shop->find('all'));
    $this->set('shops', $this->Paginator->paginate());
  }

  public function view($id = null) {
    if(!$this->Shop->exists($id)){
      throw new NotFoundException('レストランが見つかりません');
    }
    $this->set('shop', $this->Shop->findById($id));
  }

  public function add() {
    if ($this->request->is('post')) {
        $this->Shop->create();
    if ($this->Shop->save($this->request->data)) {
        $this->Flash->success('レストランを登録しました');
        return $this->redirect(['action' => 'index']);
        }
    }
  }

  public function edit($id = null){
    if(!$this->Shop->exists($id)){
      throw new NotFoundException('レストランが見つかりません');
    }

    if($this->request->is(['post', 'put'])) {
      if($this->Shop->save($this->request->data)){
        $this->Flash->success('レストランを更新しました');
        return $this->redirect(['action' => 'index']);
      }
    }
    else{
      $this->request->data = $this->Shop->findById($id);
    }
  }

  public function delete($id = null){
    if(!$this->Shop->exists($id)){
      throw new NotFoundException('レストランが見つかりません');
    }

    $this->request->allowMethod('post', 'delete');

    if($this->Shop->delete($id)){
      $this->Flash->success('レストランを削除しました');
    } else{
      $this->Flash->error('レストランを削除できませんでした');
    }

    return $this->redirect(['action' => 'index']);

  }

}
