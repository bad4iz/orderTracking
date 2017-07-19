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

///////////////////////////////////////////////////////
///   видно только мне
/// ----------------------------------------------
if ($_SESSION['auth_admin_login'] == "bad4iz") {
    d($_SESSION);
    d($mains);
    d($tableAnalystArr);
    ?>



    <?
}

/// ----------------------------------------------
///   видно только мне
///////////////////////////////////////////////////////
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

    <div class="row">

        <div class="col-md-12">
            <section class="widget">
                <header>
                    <h4>
                        <div style="text-align: end">
                            <?
                            if ($admin) { ?>
                                <p>Добавить сторку <span id="addTr" class="badge badge-success"><i class="fa fa-plus"></i></span></p>
                            <? } ?>
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
                            <th  style="max-width: 100px !important; text-align: center;">Дата заявки</th>
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
                        <p>Добавить строку <span id="addTr" class="badge badge-success"><i class="fa fa-plus"></i></span></p>
                    <? } ?>
                </div>
            </section>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="link/qw/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script >
    var table = $('#myTable').DataTable({
        "pageLength": 100, "order": [[ 1, "desc" ]]
    }).on( "draw", function () { switchHide();} );
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


