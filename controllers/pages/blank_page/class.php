<?php
class Qdmvc_Page_DatabaseSvc
{
    public function run(){

    }
    public function run_2323(){
        var_dump(Qdmvc_Page_Index::getIndex());
        return;
        Qdmvc_Helper::requestCompact();
        ?>
        <iframe id="qd-frame" src="/vnc_2015/wp-admin/nav-menus.php" frameborder="0" width="100%" height="6500px"></iframe>

        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    document.getElementById('qd-frame').onload = function() {
                        $("#qd-frame").contents().find("head")[0].appendChild($('#qd-compact-style')[0]);
                    };
                });
            })(jQuery);
        </script>

        <?php
    }
    public function run4545()
    {
        //load viewer
        Qdmvc::loadController('/pages/' . static::getPage() . '/' . 'view');
        //load View and render
        $c = static::getViewClass();
        if ($c != '') {
            $tmp = new $c($this);
            $tmp->render();
        }
    }
    public function getDataSet(){
        $re = array();
        $tmp = new QdProductPG2DCN();
        $re[0] = array(
            'Table' => 'Đồ công nghệ',
            'Count' => $tmp->COUNTLIST(),
        );

        $tmp = new QdProductPG2XE();
        $re[1] = array(
            'Table' => 'Xe',
            'Count' => $tmp->COUNTLIST(),
        );

        $tmp = new QdProductDOHIEU();
        $re[2] = array(
            'Table' => 'Đồ hiệu',
            'Count' => $tmp->COUNTLIST(),
        );

        $tmp = new QdProductPG2THIETBI();
        $re[3] = array(
            'Table' => 'Thiết bị',
            'Count' => $tmp->COUNTLIST(),
        );
        return $re;
    }
    public static function getPage(){
        return 'blank_page';
    }
    public static function getData(){
        return array();
    }
    public static function getViewClass(){
        return 'Qdmvc_Page_DatabaseSvc_View';
    }

    public function ddd()
    {
        ?>

    <?php
    }

    public function run67()
    {
        //Qdmvc::loadHelper('PHPExcel/PHPExcel');

        $fpath = plugin_dir_path(__FILE__) . '../../../excel_tpl/rpt_1/';

        $tmpdir = md5(rand());

        $tmppath = $fpath . $tmpdir;

        wp_mkdir_p($tmppath);

        $tmppath .= '/';

        copy($fpath . 'layout.xls', $tmppath . 'layout.xls');

        //write to data.txt file
        $file = fopen($tmppath . 'data.txt', "w");


        fwrite($file, "Hello World. Testing!");
        fwrite($file, "\t");
        fwrite($file, "1");
        fwrite($file, "\t");
        fwrite($file, "A1");

        fclose($file);

        //zip
        $zip = new ZipArchive();
        $zip->open($tmppath . 'package.zip', ZipArchive::CREATE);
        $zip->addFile($tmppath . 'layout.xls', '/layout.xls');
        $zip->addFile($tmppath . 'data.txt', '/data.txt');
        $zip->close();

        return;

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
//  Tell the reader to include charts when it loads a file
        $objReader->setIncludeCharts(TRUE);
//  Load the file
        $PHPExcel = $objReader->load($fpath);

        // Bước 3: Khởi tạo đối tượng mới và xử lý
        //$PHPExcel = PHPExcel_IOFactory::load($fpath);

// Bước 4: Chọn sheet - sheet bắt đầu từ 0
        $PHPExcel->setActiveSheetIndex(0);

// Bước 5: Tạo tiêu đề cho sheet hiện tại
        //$PHPExcel->getActiveSheet()->setTitle('Email List');

// Bước 6: Tạo tiêu đề cho từng cell excel,
// Các cell của từng row bắt đầu từ A1 B1 C1 ...
        for ($i = 0; $i < 10; $i++) {
            $PHPExcel->getActiveSheet()->setCellValue('A' . $i, 'STT');
            $PHPExcel->getActiveSheet()->setCellValue('B' . $i, 'Email');
            $PHPExcel->getActiveSheet()->setCellValue('C' . $i, 'Fullname');
        }

        $objWriter = new PHPExcel_Writer_Excel2007($PHPExcel);
        $objWriter->save($fpath . '.xlsx');

    }

    public function run3()
    {
        Qdmvc::loadHelper('class.Diff');
        $diff = Diff::compare('Ngay do', 'Ngay mua', true);
        echo Diff::toHTML($diff, '');
        return;
        foreach ($diff as $item) {
            if ($item[1] == Diff::DELETED) {
                echo $item[0];
            }
        }
        echo '<br>';
        foreach ($diff as $item) {
            if ($item[1] == Diff::INSERTED) {
                echo $item[0];
            }
        }
        ?>


    <?php
    }

    public function run2()
    {
        Qdmvc_Helper::requestCompact();
        echo 'blank page!'
        ?>
        <link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //alert('ddd');
                    $("<div id='qd34' style='width: auto !important; margin: 0 auto; height: auto !important;background-color: #000000;'></div>")
                        .dialog({
                            "title": "Title",
                            "buttons": {
                                "OK": function () {
                                    $(this).dialog("close");
                                }
                            },
                            resizeStop: function( event, ui ) {
                                $('#qd34').width('auto');
                            }

                        })
                        .dialogExtend({
                            "closable": true, // enable/disable close button
                            "maximizable": true, // enable/disable maximize button
                            "minimizable": true, // enable/disable minimize button
                            "collapsable": true, // enable/disable collapse button
                            "dblclick": "collapse", // set action on double click. false, 'maximize', 'minimize', 'collapse'
                            "titlebar": "transparent", // false, 'none', 'transparent'
                            "minimizeLocation": "right", // sets alignment of minimized dialogues
                            "icons": { // jQuery UI icon class
                                "close": "ui-icon-circle-close",
                                "maximize": "ui-icon-circle-plus",
                                "minimize": "ui-icon-circle-minus",
                                "collapse": "ui-icon-triangle-1-s",
                                "restore": "ui-icon-bullet"
                            },
                            "load": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "beforeCollapse": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "beforeMaximize": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "beforeMinimize": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "beforeRestore": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "collapse": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "maximize": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "minimize": function (evt, dlg) {
                                //alert(evt.type);
                            }, // event
                            "restore": function (evt, dlg) {

                            } // event
                        });

                });
            })(jQuery);
        </script>

    <?php
    }
}