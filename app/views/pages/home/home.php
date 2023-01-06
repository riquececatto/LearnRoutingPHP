<?php $this->layout('master', ['title' => $title, 'form' => $form]); ?>

<div class="container">
    <?= $this->insert($form); ?>
</div>    