<td><a class="btn catBtn" href="doReply2.php?user_id=<?= $row['user_id'] ?>">回覆</a></td>

<td>
    <form action="reply-letter.php" method="post">
        <button class="catBtn" name="user_id" value="<?= $row['user_id'] ?>">回覆</button>
    </form>
</td>

$sqlUserId = "SELECT * FROM letter letter_1 where user_id = 1 AND store_id = $store_id AND time = (SELECT MAX(time) FROM letter WHERE letter_1.user_id = letter.user_id) order by time";

$sqlUserId = "SELECT * FROM letter letter_1 
WHERE store_id = $store_id 
AND time = (SELECT MAX(time) 
FROM letter WHERE letter_1.user_id = letter.user_id) order by $orderType";