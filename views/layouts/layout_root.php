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
        wp_enqueue_media();//use for both Media and Tinymce
    }
    protected function style()
    {
        //var_dump($this->data);
        if ($this->data['view_style'] == 'compact') {
            Qdmvc_Helper::requestCompact();
        }
        ?>
        <style>
            #wpfooter {
                display: none;
            }
        </style>
    <?php
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
            MYAPP.appendParam = function (url, field, value) {
                return url + '&' + field + '=' + value;
            };
            MYAPP.openInNewTab = function (url) {
                if (window == window.parent) {
                    window.open(url, '_blank');
                    return;
                }
                window.parent.MYAPP.openInNewTab(url);
            };
            MYAPP.gotoURL = function(url, returnUrl){
                window.location.href = url;
            };
            MYAPP.showModalDialog = function (title, content, hide_ok, center) {
                (function ($) {
                    $('#qdMsgModalContent').removeClass("text-center");
                    $('#qdMsgModalOKButton').show();
                    $('#qdMsgModalTitle').html(title);
                    $('#qdMsgModalContent').html(content);
                    if(hide_ok!=undefined && hide_ok==true){
                        $('#qdMsgModalOKButton').hide();
                    }
                    if(center!=undefined && center==true){
                        $('#qdMsgModalContent').addClass("text-center");
                    }
                    $('#qdMsgModal').modal('show');
                })(jQuery);
            };
        </script>
        <!-- Modal -->
        <div class="modal fade" id="qdMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="qdMsgModalTitle">Info</h4>
                    </div>
                    <div id="qdMsgModalContent" class="modal-body">
                        [Not Set]
                    </div>
                    <div class="modal-footer" id="qdMsgModalOKButton">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    <?php
        $this->WP_Media_Selector();//need to move out of files cache
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
    protected function WP_Media_Selector(){
        //wp_enqueue_media();//moved to constructor
        ?>
        <script>
            MYAPP.MediaSelector = {};
            MYAPP.MediaSelector.open = function(btnID, txtID, getID, isMulti){
                (function($){
                    if(getID==undefined){
                        getID = false;
                    }
                    if(isMulti==undefined){
                        isMulti = false;
                    }
                    if(MYAPP.MediaSelector.Instances == undefined){
                        MYAPP.MediaSelector.Instances = {};
                    }
                    var c_instance = undefined;
                    if(MYAPP.MediaSelector.Instances[btnID] != undefined){
                        c_instance = MYAPP.MediaSelector.Instances[btnID];
                    }
                    else{
                        c_instance = {};
                        c_instance.selector = wp.media.frames.globalFrame = wp.media({
                            title: $(this).data('uploader_title'),
                            button: {
                                text: $(this).data('uploader_button_text')
                            },
                            multiple: isMulti  // Set to true to allow multiple files to be selected
                        });

                        c_instance.globalIsMulti = isMulti;
                        c_instance.globalBtnID = btnID;
                        c_instance.globalTxtID = txtID;
                        c_instance.globalGetID = getID;
                        c_instance.selector.on('select', function () {
                            var url = '';
                            attachments = c_instance.selector.state().get('selection');
                            if(c_instance.globalIsMulti){
                                for(var i=0;i<attachments.length;i++){
                                    url += attachments.models[i].attributes.url + '?id=' + attachments.models[i].attributes.id;
                                    if(i<attachments.length-1){
                                        url += '|'
                                    }
                                }
                                // iterate through selected elements
                                //attachments.each(function(attachment) {
                                //
                                //});
                            }else{
                                attachment = attachments.models[0];
                                url = attachment.attributes.url + '?id=' + attachment.attributes.id;
                            }

                            eval('MYAPP.viewModel.' + c_instance.globalTxtID + '(' + (c_instance.globalGetID===true?'attachment.id':'url') + ')');//knockout issue
                            //consider to trigger change here...
                        });
                        MYAPP.MediaSelector.Instances[btnID] = c_instance;
                    }
                    c_instance.selector.open();
                    return;

                    MYAPP.MediaSelector.globalIsMulti = isMulti;
                    MYAPP.MediaSelector.globalBtnID = btnID;
                    MYAPP.MediaSelector.globalTxtID = txtID;
                    MYAPP.MediaSelector.globalGetID = getID;
                    //MYAPP.MediaSelector.globalFrame.open();
                    // Create the media frame.
                    MYAPP.MediaSelector.globalFrame = wp.media.frames.globalFrame = wp.media({
                        title: $(this).data('uploader_title'),
                        button: {
                            text: $(this).data('uploader_button_text')
                        },
                        multiple: isMulti  // Set to true to allow multiple files to be selected
                    });
                    MYAPP.MediaSelector.globalFrame.on('select', function () {
                        var url = '';
                        attachments = MYAPP.MediaSelector.globalFrame.state().get('selection');
                        if(MYAPP.MediaSelector.globalIsMulti){
                            for(var i=0;i<attachments.length;i++){
                                url += attachments.models[i].attributes.url + '?id=' + attachments.models[i].attributes.id;
                                if(i<attachments.length-1){
                                    url += '|'
                                }
                            }
                            // iterate through selected elements
                            //attachments.each(function(attachment) {
                            //
                            //});
                        }else{
                            attachment = attachments.models[0];
                            url = attachment.attributes.url + '?id=' + attachment.attributes.id;
                        }

                        eval('MYAPP.viewModel.' + MYAPP.MediaSelector.globalTxtID + '(' + (MYAPP.MediaSelector.globalGetID===true?'attachment.id':'url') + ')');//knockout issue
                        //consider to trigger change here...

                    });
                    MYAPP.MediaSelector.globalFrame.open();
                })(jQuery);
            };
            (function ($) {
                $(document).ready(function () {
                    // Create the media frame.
                    /*
                    MYAPP.MediaSelector.globalFrame = wp.media.frames.globalFrame = wp.media({
                        title: $(this).data('uploader_title'),
                        button: {
                            text: $(this).data('uploader_button_text')
                        },
                        multiple: true  // Set to true to allow multiple files to be selected
                    });
                    */

                    // When an image is selected, run a callback.

                });
            })(jQuery);

        </script>

        <?php
    }
}