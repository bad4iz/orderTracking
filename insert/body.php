<?

use exel\VIews\Select;

$selectMeneger = [];


foreach ($mains as $main) {

    $mainDate = explode(" ", $main['date'])[0];


    ?>


    <tr>
        <!--            time-->
        <td>

            <?= $main['id'] ?>
        </td>

        <!--    дата создания заявки    -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input type="date" name="setDateMain"
                           data-main_id="<?= $main['id'] ?>" style="display:none;" value="<?= $mainDate ?>"/>
                    <div>  <?= $mainDate ? $mainDate : '......' ?></div>
                </div>
                <?
            } else {
                echo $mainDate ? $mainDate : '......';
            }
            ?>
        </td>

        <!--         -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <select required="required" data-main_id="<?= $main['id'] ?>"
                        data-placeholder="Выбрать инициатора" class=" chzn-select"
                        name="initiator">
                    <option value=""></option>
                    <? foreach ($userModel->getUsers() as $val) { ?>
                        <option value="<?= $val['name'] . ' ' . $val['femaly'] ?>"
                            <? if ($val['name'] . ' ' . $val['femaly'] == $main['initiator']) {
                                echo 'selected';
                            } ?>

                        >
                            <?= $val['name'] . ' ' . $val['femaly'] ?>
                        </option>
                    <? } ?>
                </select>
                <?
            } else {
                echo $main['initiator'] ? $main['initiator'] : '......';
            }
            ?>
        </td>

        <!--        -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input data-main_id='<?= $main['id'] ?>' type="text" value="<?= $main['productName'] ?>"
                           name="productName" style="display:none;">
                    <div>  <?= $main['productName'] ? $main['productName'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['productName'] ? $main['productName'] : '......';
            }
            ?>
        </td>

        <!--   поставцик     -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input data-main_id='<?= $main['id'] ?>' type="text" class="entryInput"
                           value="<?= $main['supplier'] ?>"
                           name="supplier" style="display:none;">
                    <div> <?= $main['supplier'] ? $main['supplier'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['supplier'] ? $main['supplier'] : '......' ;
            }
            ?>
        </td>

        <!--    стоимость товара по наклодной    -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input data-main_id='<?= $main['id'] ?>' type="text" class="entryInput" value="<?= $main['cost'] ?>"
                           name="cost" style="display:none;">
                    <div> <?= $main['cost'] ? $main['cost'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['cost'] ? $main['cost'] : '......';
            }
            ?>
        </td>

        <!--    ориентировачная дата поставки    -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input type="date" name="estimatedDeliveryDate"
                           data-main_id="<?= $main['id'] ?>" style="display:none;"
                           value="<?= $main['estimatedDeliveryDate'] ?>"/>
                    <div> <?= $main['estimatedDeliveryDate'] ? $main['estimatedDeliveryDate'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['estimatedDeliveryDate'] ? $main['estimatedDeliveryDate'] : '......';
            }
            ?>
        </td>

        <!--    Номер склада    -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <select required="required"
                        data-main_id="<?= $main['id'] ?>"
                        data-placeholder="Номер склада" class="col-xs-12 chzn-select"
                        name="warehouseNumber">
                    <option value="<?= $main['warehouseNumber'] ?>"></option>
                    <? foreach ($warehouse as $val) { ?>
                        <option value="<?= $val['warehouseNumber'] ?>"
                            <? if ($val['warehouseNumber'] == $main['warehouseNumber']) {
                                echo 'selected';
                            } ?>
                        >

                            <?= $val['warehouseNumber'] ?>
                        </option>
                    <? } ?>
                </select>
                <?
            } else {
                echo $main['warehouseNumber'] ? $main['warehouseNumber'] : '......';
            }
            ?>
        </td>

        <!--    статус получения    -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <select required="required"
                        data-main_id="<?= $main['id'] ?>"
                        data-placeholder="Стус получения" class="col-xs-12 chzn-select"
                        name="statusOfReceipt">
                    <option value="<?= $main['statusOfReceipt'] ?>"></option>
                    <? foreach ($statusOfReceipt as $val) { ?>
                        <option value="<?= $val['statusOfReceipt'] ?>"
                            <? if ($val['statusOfReceipt'] == $main['statusOfReceipt']) {
                                echo 'selected';
                            } ?>
                        >
                            <?= $val['statusOfReceipt'] ?>
                        </option>
                    <? } ?>
                </select>
                <?
            } else {
                echo $main['statusOfReceipt'] ? $main['statusOfReceipt'] : '....';
            }
            ?>
        </td>

        <!--   коментарий статуса     -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                 <textarea data-main_id="<?= $main['id'] ?>" style="display:none;" type="text"
                           class="entryInput" name="commentsStatus"><?= $main['commentsStatus'] ?></textarea>
                    <div> <?= $main['commentsStatus'] ? $main['commentsStatus'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['commentsStatus'] ? $main['commentsStatus'] : '......';
            }
            ?>
        </td>

        <!--   оприходован     -->
        <td>
            <? if ($accessOrderTracking == 1) { ?>
                <div class="switchHide">
                    <input data-main_id='<?= $main['id'] ?>' type="date" value="<?= $main['capitalized'] ?>"
                           name="capitalized" style="display:none;">
                    <div> <?= $main['capitalized'] ? $main['capitalized'] : '......' ?> </div>
                </div>
                <?
            } else {
                echo $main['capitalized'] ? $main['capitalized'] : '......';
            }
            ?>
        </td>
    </tr>


<? } // конец for
