<?php
include "SuperHTML.php";
$s = new SuperHTML("Basic Super Page");
$s->buildTop();
$s->buildBody();
$s->addText($page_content);
$s->buildBottom();
print $s->getPage();
?>