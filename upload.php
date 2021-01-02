<?php
// get the sign send by js
if(isset($_POST['upload'])){
  //arrangement a files
    $file = $_FILES["file"];
//Determine whether data is received
if ($file["error"] == 0) {
//Determine whether the image type data is received
    $typeArr = explode("/", $file["type"]);
    if ($typeArr[0] == "image") {
       
        $imgType = array("png", "jpg", "jpeg");
        if (in_array($typeArr[1], $imgType)) { 
//Specify the path of the new file
            $imgname = "imgs/" . time() . "." . $typeArr[1];
 //upload image
            $bol = move_uploaded_file($file["tmp_name"], $imgname);
            if ($bol) {
                echo "1";
            } else {
                echo "upload failed!";
            };
        };
    } else {
        
        echo "try again!";
    };
} else {
    
    echo $file["error"];
};  

}
