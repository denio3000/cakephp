
<h2>
Editing a post
</h2>
<hr/>

<div id="success"></div>

<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input('title', array('id' => 'title')); ?>
<?php echo $this->Form->input('text', array('id' => 'text')); ?>
<?php echo $this->Js->submit('Save', array(
    'before' => $this->Js->get('#inprogress')->effect('fadeIn'),
    'success' => $this->Js->get('#inprogress')->effect('fadeOut'),
    'update'=>'#success'
    )); ?>
<?php $this->Form->end(); ?>

<div id="inprogress" style="display:none">Se incarca ...</div>