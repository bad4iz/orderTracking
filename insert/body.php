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
            <div class="switchHide">
                <input type="date" name="setDateMain"
                       data-main_id="<?=  $main['id'] ?>"  style="display:none;"  value="<?=$mainDate?>"/>
                <div>  <?= $mainDate ? $mainDate : '......'  ?></div>
            </div>
        </td>

        <!--         -->
        <td>

            <select required="required"  data-main_id="<?=  $main['id'] ?>"
                    data-placeholder="Выбрать инициатора" class=" chzn-select"
                    name="initiator">
                <option value=""></option>
                <? foreach ($userModel->getUsers() as $val) { ?>
                    <option value="<?= $val['name'] . ' ' . $val['femaly']  ?>"
                            <? if($val['name'] . ' ' . $val['femaly'] ==  $main['initiator']) { echo 'selected'; }?>

                    >
                        <?= $val['name'] . ' ' . $val['femaly'] ?>
                    </option>
                <? } ?>
            </select>

        </td>

        <!--        -->
        <td>
            <div class="switchHide">
                <input data-main_id='<?=  $main['id'] ?>' type="text" value="<?=$main['productName']?>" name="productName" style="display:none;">
                <div>  <?= $main['productName'] ? $main['productName'] : '......' ?> </div>
            </div>
        </td>

        <!--   поставцик     -->
        <td>
            <div class="switchHide">
                <input data-main_id='<?=  $main['id'] ?>' type="text" class="entryInput" value="<?=$main['supplier']?>" name="supplier" style="display:none;">
                <div> <?= $main['supplier'] ? $main['supplier'] : '......' ?> </div>
            </div>
        </td>

        <!--    стоимость товара по наклодной    -->
        <td>
            <div class="switchHide">
                <input data-main_id='<?=  $main['id'] ?>' type="text" class="entryInput" value="<?=  $main['cost'] ?>" name="cost" style="display:none;">
                <div> <?= $main['cost'] ? $main['cost'] : '......' ?> </div>
            </div>
        </td>

        <!--    ориентировачная дата поставки    -->
        <td>
            <div class="switchHide">
                <input type="date" name="estimatedDeliveryDate"
                       data-main_id="<?=  $main['id'] ?>"  style="display:none;"  value="<?=$main['estimatedDeliveryDate']?>"/>
                <div> <?= $main['estimatedDeliveryDate'] ? $main['estimatedDeliveryDate'] : '......' ?> </div>
            </div>
        </td>

        <!--    Номер склада    -->
        <td>
            <select required="required"
                    data-main_id="<?=  $main['id'] ?>"
                    data-placeholder="Номер склада" class="col-xs-12 chzn-select"
                    name="warehouseNumber">
                <option value="<?= $main['warehouseNumber'] ?>"></option>
                <? foreach ($warehouse as $val) { ?>
                    <option value="<?= $val['warehouseNumber'] ?>"
                        <? if($val['warehouseNumber'] ==  $main['warehouseNumber']) { echo 'selected'; }?>
                    >

                        <?= $val['warehouseNumber'] ?>
                    </option>
                <? } ?>
            </select>
        </td>

        <!--    статус получения    -->
        <td>
            <select required="required"
                    data-main_id="<?=  $main['id'] ?>"
                    data-placeholder="Стус получения" class="col-xs-12 chzn-select"
                    name="statusOfReceipt">
                <option value="<?= $main['statusOfReceipt'] ?>"></option>
                <? foreach ($statusOfReceipt as $val) { ?>
                    <option value="<?= $val['statusOfReceipt'] ?>"
                        <? if($val['statusOfReceipt'] ==  $main['statusOfReceipt']) { echo 'selected'; }?>
                    >
                        <?= $val['statusOfReceipt'] ?>
                    </option>
                <? } ?>
            </select>
        </td>

        <!--   коментарий статуса     -->
        <td>
            <div class="switchHide">
                 <textarea  data-main_id="<?=  $main['id']  ?>" style="display:none;" type="text"
                            class="entryInput"  name="commentsStatus"><?= $main['commentsStatus']  ?></textarea>
                <div> <?= $main['commentsStatus'] ? $main['commentsStatus'] : '......' ?> </div>
            </div>
        </td>

        <!--   оприходован     -->
        <td>
            <div class="switchHide">
                <input data-main_id='<?=  $main['id']  ?>' type="date" value="<?=$main['capitalized']?>" name="capitalized" style="display:none;">
                <div> <?= $main['capitalized'] ? $main['capitalized'] : '......' ?> </div>
            </div>
        </td>
    </tr>


<? } // конец for
