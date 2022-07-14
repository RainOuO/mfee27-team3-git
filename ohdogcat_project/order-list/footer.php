<div class="d-flex justify-content-center footer-page">
    <ul class="pagination m-0">
        <li class="page-item">
            <a class="page-link <?= ($page-1<1)? 'current-active':''; ?>" 
            href="?page=<?=$page-1?>&status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&search=<?=$search?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for($i=1; $i<=$totalPage; $i++) :?>
        <li class="page-item">
            <a class="page-link <?= ($i == $page)? 'current-active':''; ?>" 
            href="?page=<?=$i?>&status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&search=<?=$search?>">
                <?=$i?>
            </a>
        </li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link <?= ($page+1>$totalPage)? 'current-active':''; ?>" 
            href="?page=<?=$page+1?>&status=<?=$status?>&order=<?=$order?>&sort=<?=$sort?>&search=<?=$search?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</div>
