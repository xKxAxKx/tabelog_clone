<?php

class ReviewsController extends AppController{

  public $uses = ['Review', 'Shop'];

  public function edit($shopId = null) {

    if (!$this->Shop->exists($shopId)){
      throw new NotFoundException('レストランが見つかりません');
    }

    $userId = $this->Auth->user('id');

    if ($this->request->is(['post', 'put'])) {
      $message = 'レビューを更新しました';
      if (empty($this->request->data['Review']['id'])) {
        $message = 'レビューを登録しました';
        $this->Review->create();
      }

      $this->request->data['Review']['user_id'] = $userId;

      if ($this->Review->save($this->request->data)) {
        $this->Flash->success($message);

        return $this->redirect([
         'controller' => 'shops',
         'action' => 'view',
         $shopId
        ]);

      }
    } else {
      $this->request->data = $this->Review->getData($shopId, $userId);
    }

    $isNew = empty($this->request->data);

    $this->set('shopId', $shopId);
    $this->set('isNew', $isNew);
  }
}
