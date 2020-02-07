<?php 
echo nl2br("Name : ");
echo $result->name;
echo nl2br("\n");
echo nl2br("Price : ");
echo $result->price;
echo nl2br("\n");
echo nl2br("Description : ");
echo $result->description;
echo nl2br("\n");
echo nl2br("Photo : ");
echo $result->photo;
echo nl2br("\n");
echo nl2br("Modified : ");
echo $result->modified;
echo nl2br("\n");
echo nl2br("Created : ");
echo $result->created;
echo nl2br("\n");

echo  nl2br ("\n");
$idArray = array();
$percentArray = array();
$mylist = array();
foreach($results as $row)
{
    $rowId = $row->id;
    if($rowId != $id)
    {
        similar_text($row->name,$result->name, $percent); // should use something better like solarium for searching
        $mylist[] = (
            array('ID' => $rowId,'percentage' => $percent)
        );
    }
}
usort($mylist, function($a, $b) {
    return $b['percentage'] <=> $a['percentage'];
});

$topMatch = array();
for ($i = 0; $i < 5; $i++)
{
   $topMatch[$i] = $mylist[$i];
}
echo nl2br("Other similar foods :\n");
foreach($results as $row)
{
    for($i = 0; $i < 5; $i ++)
    {
        if($row->id == $topMatch[$i]['ID'])
        {
            echo $row->name;
            echo " - similarity ";
            echo $topMatch[$i]['percentage'];
            echo nl2br(" %\n");
        }
            
    }
        
}
?>

