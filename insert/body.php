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
                    data-placeholder="Номер склада" class="col-xs-12 chzn-select"
                    name="initiator">
                <option value="<?= $main['warehouseNumber'] ?>"></option>
                <? foreach ($warehouse as $val) { ?>
                    <option value="<?= $val['warehouseNumber'] ?>">
                        <?= $val['warehouseNumber'] ?>
                    </option>
                <? } ?>
            </select>
        </td>

        <!--        -->
        <td>
            <select required="required"
                    data-placeholder="Выбрать инициатора" class="col-xs-12 chzn-select"
                    name="initiator">
                <option value="<?= $main['statusOfReceipt'] ?>"></option>
                <? foreach ($statusOfReceipt as $val) { ?>
                    <option value="<?= $val['statusOfReceipt'] ?>">
                        <?= $val['statusOfReceipt'] ?>
                    </option>
                <? } ?>
            </select>
        </td>

        <!--        -->
        <td>
            <div class="switchHide">
                <input data-main_id='ggg' type="text" class="entryInput" value="iii" name="name" style="display:none;">
                <div> <?= $main['commentsStatus'] ? $main['commentsStatus'] : '......' ?> </div>
            </div>
        </td>

        <!--        -->
        <td>
            <div class="switchHide">
                <input data-main_id='ggg' type="text" class="entryInput" value="iii" name="name" style="display:none;">
                <div> <?= $main['capitalized'] ? $main['capitalized'] : '......' ?> </div>
            </div>
        </td>
    </tr>


<? } // конец for
