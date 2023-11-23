<?php
    function inputValidate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    /* array item validation */
    function is_array_empty($tags)
    {
        if (is_array($tags)) {
            foreach ($tags as $key => $value) {
                if (!empty($value) || $value != NULL || $value != "") {
                    return true;
                    break; //stop the process we have seen that at least 1 of the tagsay has value so its not empty
                }
            }
            return false;
        }
    }
  
    function str_slug($string){
        $string =mb_strtolower($string);
        $string =str_replace("?","",$string);
        $string =str_replace("%","",$string);
        $string =str_replace("(","",$string);
        $string =str_replace(")","",$string);
        $string =str_replace(":","",$string);
        $string =preg_replace("/\s+/u","-",trim ($string));
        return $string;
    }
  
    function str_limit($string,$limit=80){
        $string = $string. "";
        $string = substr($string, 0,$limit);
        $string = substr($string, 0,strrpos($string, " "));
        $string = $string."...";
        return $string;
        
    }

?>