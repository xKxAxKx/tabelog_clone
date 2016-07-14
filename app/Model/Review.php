<?php

class Review extends AppModel {

  public $belongsTo = [
    'User' => [
      'className' => 'User'
    ],
    'Shop' => [
      'className' => 'Shop'
    ]
  ];

  public $validate = [
    'title' => [
      'rule' => 'notBlank'
    ],
    'body' => [
      'rule' => 'notBlank'
    ],
    'score' => [
      'numeric' => [
        'rule' => 'numeric',
        'message' => '数値を入力してください'
      ]
    ]
  ];

  public function getData($shopId, $userId) {

    $options = [
      'conditions' => [
        'shop_id' => $shopId,
        'user_id' => $userId
      ]
    ];

    return $this->find('first', $options);
  }
}
