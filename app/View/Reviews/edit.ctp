<?php
    $titleLabel = $isNew ? '投稿' : '編集';
    $submitLabel = $isNew ? '投稿' : '更新';
?>

<h2>レビュー<?= $titleLabel; ?></h2>

<?= $this->Form->create('Review'); ?>
<?= $this->Form->input('score', [
    'label' => '点数',
    'type' => 'select',
    'options' => [
            1 => '★☆☆☆☆',
            2 => '★★☆☆☆',
            3 => '★★★☆☆',
            4 => '★★★★☆',
            5 => '★★★★★',
        ]
]); ?>

<?= $this->Form->input('title', ['label' => 'タイトル']); ?>
<?= $this->Form->input('body', ['label' => '内容']); ?>
<?= $this->Form->hidden('id'); ?>
<?= $this->Form->hidden('shop_id', ['value' => $shopId]); ?>
<?= $this->Form->end($submitLabel); ?>
