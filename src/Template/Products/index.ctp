<?php
echo "<td><a href = '".$this->Url->build(["controller" => "Products","action"=>"add"])."'>Add</a></td>";
echo " | ";
echo "<td><a href = '".$this->Url->build(["controller" => "Products","action"=> "xmlOutput"])."'>Output to XML</a></td></tr>";
echo " | ";
echo "<td><a href = '".$this->Url->build(["controller" => "Products","action"=> "import"])."'>Import from JSON</a></td></tr>";
?>
<table>
   <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Modified</th>
        <th>Created</th>
   </tr>

   <?php
      foreach ($results as $row):
         echo "<tr><td>".$row->id."</td>"; 
         //echo "<td>".$row->name."</td>";
         //echo "<td><a href = 'similar'>".$row->name."</a></td>";
         echo "<td><a href = '".$this->Url->build
         (["controller" => "Products","action"=>"similar",$row->id])."'>".$row->name."</a></td>";
         echo "<td>".$row->price."</td>";
         echo "<td>".$row->description."</td>";
         echo "<td>".$row->photo."</td>";
         echo "<td>".$row->modified."</td>";
         echo "<td>".$row->created."</td>";
         echo "<td><a href = '".$this->Url->build
         (["controller" => "Products","action"=>"edit",$row->id])."'>Edit</a></td>";
         
         echo "<td><a href = '".$this->Url->build
         (["controller" => "Products","action"=> "delete",$row->id])."'>Delete</a></td></tr>";
         

      endforeach;
   ?>
</table>