<td><a class="btn catBtn" href="doReply2.php?user_id=<?=$row['user_id']?>">回覆</a></td>

<td>
                        <form action="reply-letter.php" method="post">
                            <button class="catBtn" name="user_id" value="<?=$row['user_id']?>">回覆</button>
                        </form>
                        </td>