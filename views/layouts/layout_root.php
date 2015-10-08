<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 8/23/15
 * Time: 4:56 PM
 */
class Qdmvc_Layout_Root
{
    protected $page = null;
    protected $data = null;

    function __construct($page)
    {
        $this->page = $page;
        $this->data = $page->getData();
    }

    public function render()
    {
        ?>
        <div id="cardLoadingImg"
             style="width: 100%; height: 200px; text-align: center; background: url(<?= Qdmvc_Helper::getImgURL("ajax-loader_blue.gif") ?>) no-repeat center center transparent">
            <h4>Loading...</h4>
        </div>
    <?php
    }

    protected function layout_nopermission()
    {
        ?>
        <div style="
            display: inline-block;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100px;
            margin: auto; text-align: center">
            You are not allowed to view this Page
        </div>
    <?php
    }

    protected function preConfig()
    {
        ?>
        <script>
            var MYAPP = MYAPP || {};
            MYAPP.getURIParam = function (uri, p_name) {
                //var result = {};
                var params = uri.split(/\?|\&/);
                var found = '';
                params.forEach(function (it) {
                    if (it) {
                        var param = it.split("=");
                        if (param[0].toLowerCase() == p_name.toLowerCase()) found = param[1];
                    }
                });
                return found;
            };
            MYAPP.getQRCodeLink = function(text, width, height){
                if(width===undefined){
                    width = 300;
                }
                if(height===undefined){
                    height = 300;
                }
                var qrlink = 'http://chart.apis.google.com/chart?cht=qr&chs='+width+'x'+height+'&chl=' + text + '&choe=UTF-8&chld=L';
                return qrlink;
            };
            MYAPP.printDoc = function(divHtml, pageWidth, pageHeight, preview){
                var document = null;
                var newWindow = window.open('', '', 'width='+pageWidth+', height='+pageHeight);
                var document = newWindow.document.open();
                var pageContent =
                        '<!DOCTYPE html>'
                        + '<html>'
                        + '<head>'
                        + '<meta charset="utf-8" />'
                        + '<title>Print Preview</title>'
                        + '</head>'
                        + '<body>'
                        + '<script>'
                        + '    var qdPrint = function(){'
                        + '        var link = document.getElementById("toolpanel");'
                        + '        link.style.display = "none";'
                        //+ '        window.onunload = function(){alert("ddd")};'
                        + '        window.print();'
                        + '    };'
                        + '<\/script>'
                        + '<div id="toolpanel">'
                        + '<button id="qdprint" onclick="qdPrint()">Print</button>'
                        +'<hr></div>'
                        + divHtml
                        + '</body></html>';
                document.write(pageContent);
                document.close();
                if(preview==undefined || preview===false){
                    newWindow.qdPrint();
                }
            };
            MYAPP.printDocPreview = function(divHtml, pageWidth, pageHeight){
                MYAPP.printDoc(divHtml, pageWidth, pageHeight, true);
            };
            MYAPP.addDataPortFilter = function (url, index, field, value, operator) {
                if (operator == undefined) operator = 'EQUAL';
                return url + '&filterdatafield' + index + '=' + field + '&filtervalue' + index + '=' + value + '&filtercondition' + index + '=' + operator;
            };
            MYAPP.openInNewTab = function (url) {
                if (window == window.parent) {
                    window.open(url, '_blank');
                    return;
                }
                window.parent.MYAPP.openInNewTab(url);
            };
        </script>
    <?php
    }

    protected function onReadyHook()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    if ($('#qdmvcRootDiv').length) {
                        $('#qdmvcRootDiv').css('display', 'block');
                    }
                    if ($('#cardLoadingImg').length) {
                        $('#cardLoadingImg').css('display', 'none');
                    }
                });
            })(jQuery);
        </script>
    <?php
    }
}