<?php var_dump($_POST);




echo " <p> Thanks (" . getGender ($_POST["Gender"]) . ")". $_POST["fname"] ." ". $_POST["lname"] 
. " ". 

"  <br> Please Review Your Information
Name :". $_POST["username"] ."</br> 
Address : " .$_POST["address"]."</br> 
Your Skills :</br> "; foreach($_POST['Skills']as $skill)
{
    echo $skill . "</br>" ;
} ; 



function getGender ($gender){
if ($gender=="M") {
    return "Mr";
}
else{
    return "Miss";
}
}


// foreach($_POST['Skills']as $skill)
// {
//     echo $skill ;
// }