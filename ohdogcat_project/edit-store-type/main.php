<?php if ($userCount > 0) :
                            $row = $result->fetch_assoc();
                        ?>
                            <!-- <div class="py-2">
                <a class="btn btn-info" href="user.php">取消</a>
            </div> -->
                            <form class="form2 px-3" action="storeRightupALL.php" method="POST">
                                <table>
                                <!-- <input name="id" type="hidden" value="<?= $row["id"] ?>"> -->
                                <br>
                                <div>
                                    <input class="tripinput" type="checkbox" name="type_1" value="1">旅遊
                                    <img class="trip" src="../store-info/IMAGES/travel-luggage.png" alt="" style="width: 100px; height:auto;">
                                </div>
                                <br>
                                <div>
                                <input class="tripinput" type="checkbox" name="type_2" value="2">餐廳
                                    <img class="trip" src="../store-info/IMAGES/cafe.png" alt="" style="width: 100px; height:auto;">
                                    </div>
                                <br>
                                <div>
                                <input class="tripinput" type="checkbox" name="type_3" value="3">旅館
                                    <img class="trip" src="../store-info/IMAGES/hotel.png" alt="" style="width: 100px; height:auto;">
                                    </div>
                                <br>
                                <div>
                                <input class="tripinput" type="checkbox" name="type_4" value="4">寵物商品
                                    <img class="trip" src="../store-info/IMAGES/pet-house.png" alt="" style="width: 100px; height:auto;">
                                    </div>
                                <br>

                                <div class="py-2 text-end">
                                    <button type="submit" class="btn5" href="#">儲存</button>
                                </div>
                                </table>
                            </form>

                        <?php else : ?>
                            沒有該使用者
                        <?php endif; ?>
                </div>



