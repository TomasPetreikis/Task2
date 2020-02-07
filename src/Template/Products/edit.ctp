<?php
   echo $this->Form->create("Products",array('url'=>'/products/edit/'.$id));
   echo $this->Form->input('name',['value'=>$name]);
   echo $this->Form->input('price',['value'=>$price]);
   echo $this->Form->input('description',['value'=>$description]);
   echo $this->Form->input('photo',['value'=>$photo]);
   echo $this->Form->button('Submit');
   echo $this->Form->end();
?>