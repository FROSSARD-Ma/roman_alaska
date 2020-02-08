<?php

	if (isset($_GET['paging']) AND !empty($_GET['paging']) AND $_GET['paging']>0 AND $_GET['paging'] = intval($_GET['paging']))
    {
        $currentPage = intval($_GET['paging']);
    }
    else 
    {
        $currentPage = 1;
    }

	$prevPage = $currentPage - 1;
	$nextPage = $currentPage + 1;
	$totalPage = ceil($_SESSION['countChapters'] / 5);
?>

	<section class="paging-center">

		<?php if ($_GET['paging'] > 1)
		{ ?>
            <a href="index.php?page=chapters&paging=<?=$prevPage;?>" class="button" role="button">&#10094;</a>
        <?php } ?>
        
        	<a href="index.php?page=chapters&paging=<?=$currentPage;?>" class="button" role="button">Page <?=$currentPage;?></a>

        <?php if ($nextPage <= $totalPage)
        { ?>
            <a href="index.php?page=chapters&paging=<?=$nextPage;?>" class="button" role="button">&#10095;</a>
        <?php } ?>

	</section>