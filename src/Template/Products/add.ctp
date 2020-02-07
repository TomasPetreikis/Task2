<?php
   echo $this->Form->create("Products",array('url'=>'/products/add'));
   echo $this->Form->input('name');
   echo $this->Form->input('price');
   echo $this->Form->input('description');
   echo $this->Form->input('photo');
   echo $this->Form->input('modified');
   echo $this->Form->input('created');
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>