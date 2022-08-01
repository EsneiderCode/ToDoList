<?php $text = strip_tags(apply_filters('the_content',get_the_content()),"<p><a><br><b><u><i><strong><span><div>");
$pieces = explode("***", $text);
foreach($pieces as $pi){
  echo $pi;}?>