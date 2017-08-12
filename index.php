<?

// получить все значения енума
// statusOfReceipt
// SHOW COLUMNS FROM orderTracking LIKE "statusOfReceipt"
// preg_match('/enum\((.*)\)$/', $type, $matches); $type-просто возвращаеая строка которую надо распарсить // $matches - куда будет положен результаь
//$vals = explode(',', $matches[1]);
//

use exel\model\MainModel;
use exel\model\MenegerModel;
use exel\model\StatusOfReceipt;
use exel\VIews\Select;

$accessModel = new \exel\model\Access();
$accessOrderTracking = $accessModel->getAccessByUser($_SESSION['IDUser']);


$statusOfReceiptModel = new StatusOfReceipt();
$statusOfReceipt = $statusOfReceiptModel->getAll();

$mainModel = new MainModel();
$menegerModel = new MenegerModel();

//$statusOfReceipt = $mainModel->getStatusOfReceipt();

$warehouseModel = new \exel\model\Warehouse();
$warehouse = $warehouseModel->getAll();

$mains = $mainModel->getAll();
$menegers = $menegerModel->getAllMenegerKom();

if ($_SESSION['access'] == 6) {
    $admin = true;
} else if ($_SESSION['access'] == 10) {
    {
        $m = $_SESSION['IDUser'];
    }
}

$userModel = new \exel\model\User();


?>


<link href="link/qw/jquery-ui.min.css" rel="stylesheet">
<link href="link/qw/jquery-ui.theme.min.css" rel="stylesheet">
<link href="https://jquery-ui-bootstrap.github.io/jquery-ui-bootstrap/css/custom-theme/jquery-ui-1.10.3.custom.css"
      rel="stylesheet">
<style>
    .ui-datepicker.ui-datepicker-multi {
        width: auto;
        margin: auto;
    }
</style>

<div class="content container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title"><i class="fa fa-list-alt"></i> Таблица
                <!--                <small>Different variations</small>-->
            </h2>
        </div>
    </div>
    <? if ($_SESSION['access'] == 1) { ?>
        <div class="panel-group" id="accordion2">
            <div class="panel">


                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                        Администраторы таблицы

                    </a>
                </div>

                <div id="collapseOne" class="panel-collapse collapse" style="height: auto;">
                    <div class="panel-body">
                        <?
                        $admins = $accessModel->getUsersByAccess(1);

                        foreach ($admins as $admin) { ?>
                            <p><?= $admin['femaly'] . ' ' . $admin['name'] ?> <a
                                        href="order-tracking/menegerRouter?idUserAccess=<?= $admin['idUser'] ?>">удалить</a>
                            </p>
                        <? } ?>


                        <form action="order-tracking/menegerRouter" method="post">
                            <input type="hidden" value="1" name="idAccess">
                            <select required="required"
                                    data-placeholder="Выбрать админа" class=" chzn-select"
                                    name="idUser">
                                <option value=""></option>
                                <? foreach ($userModel->getUsers() as $val) { ?>
                                    <option value="<?= $val['IDUser'] ?>">
                                        <?= $val['name'] . ' ' . $val['femaly'] ?>
                                    </option>
                                <? } ?>
                            </select>
                            <input type="submit" value="add">
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#analyst">
                        Внесение даты прихода с отправкой SMS
                    </a>
                </div>
                <div id="analyst" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?
                        $userSms = $accessModel->getUsersByAccess(2);

                        foreach ($userSms as $item) { ?>
                            <p><?= $item['femaly'] . ' ' . $item['name'] ?> <a
                                        href="order-tracking/menegerRouter?idUserAccess=<?= $item['idUser'] ?>">удалить</a>
                            </p>
                        <? } ?>


                        <form action="order-tracking/menegerRouter" method="post">
                            <input type="hidden" value="2" name="idAccess">
                            <select required="required"
                                    data-placeholder="Выбрать" class=" chzn-select"
                                    name="idUser">
                                <option value=""></option>
                                <? foreach ($userModel->getUsers() as $val) { ?>
                                    <option value="<?= $val['IDUser'] ?>">
                                        <?= $val['name'] . ' ' . $val['femaly'] ?>
                                    </option>
                                <? } ?>
                            </select>
                            <input type="submit" value="add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <? } ?>


    <!--    //\///////////////////////   диапазон \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
    <div class="panel-group" id="accordion2">
        <div class="panel">

            <div class="panel-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                   href="#collapseBringOnCharge">
                    Выборка по датам
                </a>
            </div>


            <div id="collapseBringOnCharge" class="panel-collapse collapse" style="height: auto;">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <header>
                                <h4>
                                    Дата заявки
                                </h4>
                            </header>
                            <div id="date_rangeDate"></div>

                            <div class="col-md-4" style="margin: auto; float: none">
                                <button class="btn btn-lg btn-warning btn-block" onclick="resetDate()">
                                    Сбросить
                                </button>
                            </div>
                        </div>

                        <div class=" col-md-4">
                            <header>
                                <h4>
                                    Ориентировочная дата поставки
                                </h4>
                            </header>
                            <div id="date_rangeIndicativeDate"></div>

                            <div class="col-md-4" style="margin: auto; float: none">
                                <button class="btn btn-lg btn-warning btn-block" onclick="resetRangeIndicativeDate()">
                                    Сбросить
                                </button>
                            </div>
                        </div>

                        <div class=" col-md-4">
                            <header>
                                <h4>
                                    Оприходован
                                </h4>
                            </header>
                            <div id="date_rangeСapitalized"></div>

                            <div class="col-md-4" style="margin: auto; float: none">
                                <button class="btn btn-lg btn-warning btn-block" onclick="resetRangeСapitalized()">
                                    Сбросить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                   href="#collapseCost">
                    Выборка по стоимости
                </a>
            </div>
            <div id="collapseCost" class="panel-collapse collapse" style="height: auto;">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-horizontal">
                            <fieldset id="rangeCost">
                                <div class="control-group">
                                    <label class="control-label " for="tooltip-enabled">Минимальное число</label>
                                    <div class="controls form-group">
                                        <div class="col-sm-5">
                                            <input type="number" id="minCost"
                                                   class="form-control"
                                                   data-placement="top"
                                                   data-original-title="введите тут минимальное число"
                                                   placeholder="Минимальное число"></div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label " for="tooltip-enabled">Максимальное число</label>
                                    <div class="controls form-group">
                                        <div class="col-sm-5">
                                            <input type="number" id="maxCost"
                                                   class="form-control"
                                                   data-placement="top"
                                                   data-original-title="введите тут максимальное число"
                                                   placeholder="Максимальное число"></div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="col-md-4" style="margin: auto; float: none">
                                <button class="btn btn-lg btn-warning btn-block" onclick="resetDate()">
                                    Сбросить
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--    //\///////////////////////  ч диапазон  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->

    <div class="split"></div>

    <div class="row">

        <div class="col-md-12">
            <section class="widget">
                <header>
                    <h4>
                        <div style="text-align: end">

                            <p>Добавить сторку <span id="addTr" class="badge badge-success"><i
                                            class="fa fa-plus"></i></span></p>

                        </div>

                        <!--                        <a href="?delete="> Выйти</a>-->
                    </h4>
                </header>
                <style>
                    select, textarea {
                        color: initial;
                        font: inherit;
                        margin: 0;
                    }
                </style>
                <div class="body">
                    <?
                    rsort($mains);
                    //                    d($mains);

                    ?>
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th class="no-sort">#</th>
                            <th style="max-width: 100px !important; text-align: center;">Дата заявки</th>
                            <th style="text-align: center;">инициатор</th>
                            <th style="text-align: center;">наименование товара (общее)</th>
                            <th style="text-align: center;">поставщик</th>
                            <th style="text-align: center;">стоимость товара по накладной</th>
                            <th style="text-align: center;">ориентировочная дата поставки</th>
                            <th style="text-align: center;">номер склада</th>
                            <th style="text-align: center;">статус получения</th>
                            <th style="text-align: center;">комментарии статуса</th>
                            <th style="text-align: center;">оприходован</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? include 'insert/body.php'; ?>

                        </tbody>
                    </table>
                    <blockquote>

                    </blockquote>
                </div>
                <div style="text-align: end">
                    <?
                    if ($admin) { ?>
                        <p>Добавить строку <span id="addTr" class="badge badge-success"><i
                                        class="fa fa-plus"></i></span></p>
                    <? } ?>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="link/qw/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script>

</script>

<script src="orderTracking/js/lib/lib.js"></script>
<script src="orderTracking/js/meneger.js"></script>

<!-- jquery and friends -->
<script src="/link/lib/jquery/jquery-2.0.3.min.js"></script>
<script src="/link/lib/jquery-pjax/jquery.pjax.js"></script>


<!-- jquery plugins -->
<script src="/link/lib/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="/link/lib/parsley/parsley.js"></script>
<script src="/link/lib/icheck.js/jquery.icheck.js"></script>
<script src="/link/lib/select2.js"></script>
<script src="/link/lib/jquery.autogrow-textarea.js"></script>


<!--backbone and friends -->
<script src="/link/lib/backbone/underscore-min.js"></script>

<!-- bootstrap default plugins -->
<script src="/link/lib/bootstrap/transition.js"></script>
<script src="/link/lib/bootstrap/collapse.js"></script>
<script src="/link/lib/bootstrap/alert.js"></script>
<script src="/link/lib/bootstrap/tooltip.js"></script>
<script src="/link/lib/bootstrap/popover.js"></script>
<script src="/link/lib/bootstrap/button.js"></script>
<script src="/link/lib/bootstrap/dropdown.js"></script>
<script src="/link/lib/bootstrap/modal.js"></script>

<!-- bootstrap custom plugins -->
<script src="/link/lib/bootstrap-datepicker.js"></script>
<script src="/link/lib/bootstrap-select/bootstrap-select.js"></script>
<script src="/link/lib/wysihtml5/wysihtml5-0.3.0_rc2.js"></script>
<script src="/link/lib/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="/link/lib/bootstrap-switch.js"></script>
<script src="/link/lib/bootstrap-colorpicker.js"></script>

<!-- basic application js-->
<script src="/link/js/app.js"></script>
<script src="/link/js/settings.js"></script>

<!-- page specific -->
<script src="/link/js/forms-elemets.js"></script>

<!--////////////////////////////////////////////////////-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    -->  <!--подключение вызывает конфликт-->
<script src="link/qw/jquery-ui.min.js"></script>
<script src="https://rawgit.com/Artemeey/5ebc39370e568c34f03dce1639cabee8/raw/8de40b26479c406ee9cd6f9b4b3f4ad05370a024/jquery.datepicker.extension.range.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

    var table = $('#myTable').DataTable({
        "pageLength": 100, "order": [[1, "desc"]]
    }).on("draw", function () {
        switchHide();
    });


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////     //////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////
    //       ///      //    ////////////////////////////////////////////////////////////////////////////////////
    //        ///       //     /////////////////////////////////////////////////////////////////////////////////////
    //       ///      //     ///////////////////////////////////////////////////////////////////////////////////////
    ////////////////        ///////////////////////////////////////////////////////////////////////////////////////
    ///                 ///////////////////////////////////////////////////////////////////////////////////////
    ///            //////////////////////////////////////////////////////////////////////////////////////////////
    ///                ////////////////////////////////////////////////////////////////////////////////////////////

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    function isUndef(x) {
        return x === undefined;
    }

    //


    ///////////////////////////////////////////////////////////
    /////////                 Дата заявки
    ///////////////////////////////////////////////////////////


    var date_rangeDate = $('#date_rangeDate');
    date_rangeDate.datepicker({
        range: 'period', // режим - выбор периода
        numberOfMonths: 2,
        defaultDate: null, // сброс выбора по умолчанию
        onSelect: function (dateText, inst, extensionRange, caused) { // метод выполняется когда изменился выбор дат

            $.fn.dataTable.ext.search.push(
                function mainRange(settings, data, dataIndex, rowData, counter) {
                    console.log('date_rangeDate');
                    var minTmp = extensionRange.startDateText || " ";

                    var date = data[1].trim() || ""; // столбик для сравнения
                    var tmpMin = minTmp.split("/");

                    if (!(Array.isArray(tmpMin) && tmpMin.length > 2)) {
                        return true
                    }

                    var min = tmpMin[2] + "-" + tmpMin[0] + "-" + tmpMin[1];

                    var maxTmp = extensionRange.endDateText || " ";
                    var tmpMax = maxTmp.split("/");
                    var max = tmpMax[2] + "-" + tmpMax[0] + "-" + tmpMax[1];

                    if (( isUndef(min) && isUndef(max) ) || ( isUndef(min) && date <= max ) ||
                        ( min <= date && isUndef(max) ) || ( min <= date && date <= max )) {
                        return true;
                    }
                    return false;
                });

            table.draw();
            $.fn.dataTable.ext.search.pop();
        }
    });

    var extensionRange = date_rangeDate.datepicker("widget").data("datepickerExtensionRange"); //
    extensionRange.startDateText = "01";
    extensionRange.endDateText = "01/01/9999";

    function resetDate() {
        extensionRange.startDateText = "01";
        extensionRange.endDateText = "01/01/9999";
        table.draw();
    }

    //    resetDate();
    ////////////////////////////////////////////////////////
    ///////   ориентировочная дата доставки
    ///////////////////////////////////////////////////

    var extensionRangeIndicative = date_rangeDate.datepicker("widget").data("datepickerExtensionRange"); //
    extensionRangeIndicative.startDateText = "01";
    extensionRangeIndicative.endDateText = "01/01/9999";

    function resetRangeIndicativeDate() {
        extensionRangeIndicative.startDateText = "01";
        extensionRangeIndicative.endDateText = "01/01/9999";
        table.draw();
    }

    var date_rangeIndicativeDate = $('#date_rangeIndicativeDate');
    date_rangeIndicativeDate.datepicker({
        range: 'period', // режим - выбор периода
        numberOfMonths: 2,
//        defaultDate: null, // сброс выбора по умолчанию
        onSelect: function (dateText, inst, extensionRangeIndicative, caused) { // метод выполняется когда изменился выбор дат
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    console.log('кастомный сортировка');
                    var minTmp = extensionRangeIndicative.startDateText || " ";

                    var date = data[6].trim() || ""; // столбик для сравнения
                    var tmpMin = minTmp.split("/");

                    if (!(Array.isArray(tmpMin) && tmpMin.length > 2)) {
                        return true
                    }

                    var min = tmpMin[2] + "-" + tmpMin[0] + "-" + tmpMin[1];

                    var maxTmp = extensionRangeIndicative.endDateText || " ";
                    var tmpMax = maxTmp.split("/");
                    var max = tmpMax[2] + "-" + tmpMax[0] + "-" + tmpMax[1];

                    if (( isUndef(min) && isUndef(max) ) || ( isUndef(min) && date <= max ) ||
                        ( min <= date && isUndef(max) ) || ( min <= date && date <= max )) {
                        return true;
                    }
                    return false;
                });
            table.draw();
            $.fn.dataTable.ext.search.pop();
        }
    });

    //
    ////////////////////////////////////////////////////////
    ///////   оприходован
    ///////////////////////////////////////////////////

    var extensionRangeСapitalized = $('#date_rangeСapitalized').datepicker("widget").data("datepickerExtensionRange"); //
    extensionRangeСapitalized.startDateText = "01";
    extensionRangeСapitalized.endDateText = "01/01/9999";

    function resetRangeСapitalized() {
        extensionRangeСapitalized.startDateText = "01";
        extensionRangeСapitalized.endDateText = "01/01/9999";
        table.draw();
    }

    $('#date_rangeСapitalized').datepicker({
        range: 'period', // режим - выбор периода
        numberOfMonths: 2,
//        defaultDate: null, // сброс выбора по умолчанию
        onSelect: function (dateText, inst, extensionRangeСapitalized, caused) { // метод выполняется когда изменился выбор дат
            $.fn.dataTable.ext.search.push(
                function (settings, data, dataIndex) {
                    console.log('кастомный сортировка');
                    var minTmp = extensionRangeСapitalized.startDateText || " ";

                    var date = data[10].trim() || ""; // столбик для сравнения
                    var tmpMin = minTmp.split("/");

                    if (!(Array.isArray(tmpMin) && tmpMin.length > 2)) {
                        return true
                    }

                    var min = tmpMin[2] + "-" + tmpMin[0] + "-" + tmpMin[1];

                    var maxTmp = extensionRangeСapitalized.endDateText || " ";
                    var tmpMax = maxTmp.split("/");
                    var max = tmpMax[2] + "-" + tmpMax[0] + "-" + tmpMax[1];

                    if (( isUndef(min) && isUndef(max) ) || ( isUndef(min) && date <= max ) ||
                        ( min <= date && isUndef(max) ) || ( min <= date && date <= max )) {
                        return true;
                    }
                    return false;
                });
            table.draw();
            $.fn.dataTable.ext.search.pop();
        }
    });

    ////////////////////////////////////////////////////////////////////////////////////////
    /////////////     по стоимости
    ////////////////////////////////////////////////////////////////////////////////////////

    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            console.log('cost');
            var min = parseInt( $('#minCost').val(), 10 );
            var max = parseInt( $('#maxCost').val(), 10 );
            var age = parseFloat( data[5] ) || 0; // use data for the age column

            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && age <= max ) ||
                ( min <= age   && isNaN( max ) ) ||
                ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );


        // Event listener to the two range filtering inputs to redraw on input
        $('#minCost, #maxCost').keyup( function() {
            console.log('key');

            table.draw();
        } );


</script>';
