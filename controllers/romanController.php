<?php

function home()
{
    $chapterManager = new Alaska\ChapterManager; // Création Objet
    $Chapters = $chapterManager->home2Chapters();
    require('view/frontend/home.php');
}

function chapter()
{
    $chapterManager = new Alaska\ChapterManager; // Création Objet
    $Chapters = $chapterManager->home2Chapters();
    require('view/frontend/chapter.php');
}
function chapters()
{
	$chapterManager = new Alaska\ChapterManager; // Création Objet
	$Chapters = $chapterManager->listChapters();
    require('view/frontend/chapters.php');
}