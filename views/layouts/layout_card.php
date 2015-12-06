<?php

/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 02/03/2015
 * Time: 12:59 PM
 */
Qdmvc::loadLayout('layout_root');

class Qdmvc_Layout_Card extends Qdmvc_Layout_Root
{
    protected $obj = null;
    protected $obj_json = null;

    protected static $ctl_prefix = 'ctl_';

    function __construct($page)
    {
        parent::__construct($page);

        if (isset($this->data['obj'])) {
            $this->obj = $this->data['obj'];
            $this->obj_json = json_encode($this->data['obj_json']);
        }
    }

    protected function internalGateway()
    {
        ?>
        <?= $this->callFnAction() ?>
        <script>
            MYAPP.formValidation = {};
            MYAPP.formValidationError = function () {
                for (i in MYAPP.formValidation) {
                    if (MYAPP.formValidation[i].type == 'error') {
                        return true;
                    }
                }
                return false;
            };
            MYAPP.clearFormValidationMark = function () {
                (function ($) {
                    //clear form validation mark and tooltip
                    //var $inputs = $("#cardForm :input[type=text]");
                    var $inputs = $("#cardForm :input");
                    $inputs.each(function () {
                        $(this).css('border-color', '#ddd');//set to boootstrap default
                        try {
                            $(this).jqxTooltip('destroy');//{ content: '', position: 'bottom', name: ''});
                        } catch (error) {
                            console.log(error);
                        }
                    });

                })(jQuery);
            };
            MYAPP.showModalDialog = function (title, content) {
                (function ($) {
                    $('#qdMsgModalTitle').html(title);
                    $('#qdMsgModalContent').html(content);
                    $('#qdMsgModal').modal('show');
                })(jQuery);
            };
            MYAPP.AllError = [];
            MYAPP.showMsgHistory = function (limit) {
                if (limit == undefined) {
                    limit = 7;
                }
                MYAPP.showMsg(MYAPP.AllError[MYAPP.AllError.length - 1], false);
            };
            MYAPP.addSysBtn = function (btnid, label, data_bind_formular) {
                (function ($) {
                    var tmpbtn = $('<button class="btn btn-info btn-xs qd-action-btn" type="button" id="' + btnid + '"><span data-bind="' + data_bind_formular + '"></span>' + label + '</button>');
                    $('#qdsysbtn').append(tmpbtn);
                })(jQuery);
            };

            MYAPP.showMsg = function (msg, reghistory) {
                (function ($) {
                    //clear notification => do not useful
                    //$('#jqxMsg').jqxNotification('closeAll');
                    //reg in History
                    if (reghistory !== false) {
                        MYAPP.AllError.push(msg);
                    }
                    //display new validation mark and msg bus
                    for (key in msg) {

                        var type = msg[key].type;
                        var template = type == '' ? 'success' : type;

                        if (msg[key].field != null && msg[key].field != '') {
                            var field = $("#cardForm input[name='" + msg[key].field + "']");

                            field.jqxTooltip({content: msg[key].msg, position: 'bottom', name: msg[key].field});

                            if (type == 'error') {
                                field.css('border-color', 'red');
                            }
                            else if (type == 'warning') {
                                field.css('border-color', 'orange');
                            }
                            else if (type == 'info') {
                                field.css('border-color', 'blue');
                            }
                        }

                        $('#jqxMsg').jqxNotification({template: template});
                        $("#jqxMsgContent").html(msg[key].msg);
                        $("#jqxMsg").jqxNotification("open");
                    }
                    /*
                     for (i = 0; i < msg.length; i++) {

                     }*/
                })(jQuery);
            }
        </script>
        <script>
            MYAPP.requestLookupWindow = function (src, okfn) {
                //set window iframe source
                //alert(src);
                (function ($) {
                    var winf = $("#windowFrame");
                    winf.contents().find("body").html('');//do a trick to hide previous result
                    winf.attr('src', src);
                    winf[0].onload = function(){
                        MYAPP.onLookupDone = okfn;
                    };
                    $('#jqxlookupwin').jqxWindow('open');
                })(jQuery);
            };
            MYAPP.addQueryToLookupURL = function (lurl, dynamic_filter_fields) {
                var i;
                for (i = 0; i < dynamic_filter_fields.length; i++) {
                    var tmp_id = $('#ctl_' + dynamic_filter_fields[i]).val();
                    if (tmp_id != '') {
                        lurl += '&filterdatafield' + i + '=' + dynamic_filter_fields[i] + '&filtervalue' + i + '=' + tmp_id;
                    }
                }
                return lurl;
            };
            MYAPP.datepicker_tmp_return_id = null;
            MYAPP.requestDatePickerWindow = function (return_id) {
                (function ($) {
                    MYAPP.datepicker_tmp_return_id = return_id;
                    $('#qddatepicker').val($('#' + return_id).val());
                    $('#jqxdatepickerwin').jqxWindow('open');
                })(jQuery);
            };
            MYAPP.requestFormValidate = function (rules_) {
                (function ($) {
                    //register validate
                    $('#cardForm').jqxValidator({
                        rules: rules_
                    });
                })(jQuery);
            };

        </script>

    <?php
    }

    protected function formValidation()
    {
        ?>
        <script>
            //trigger open windows
            (function ($) {
                $(document).ready(function () {
                    //auto assign value from obj
                    //validate, require
                    MYAPP.requestFormValidate(
                        []
                    );
                });
            })(jQuery);
        </script>
    <?php
    }

    private function progressSpinner()
    {
        ?>
        <style>
            .ajax_loader {
                background: url(<?=Qdmvc_Helper::getImgURL("ajax-loader_blue.gif")?>) no-repeat center center transparent;
                width: 100%;
                height: 100%;
            }
        </style>
        <script>
            /*
             * Ajax overlay 1.0
             * Author: Simon Ilett @ aplusdesign.com.au
             * Descrip: Creates and inserts an ajax loader for ajax calls / timed events
             * Date: 03/08/2011
             */
            function ajaxLoader(el, options) {
                // Becomes this.options
                var defaults = {
                    bgColor: '#fff',
                    duration: 800,
                    opacity: 0.7,
                    classOveride: false
                };
                this.options = jQuery.extend(defaults, options);
                this.container = jQuery(el);

                this.init = function () {
                    var container = this.container;
                    // Delete any other loaders
                    this.remove();
                    // Create the overlay
                    var overlay = jQuery('<div></div>').css({
                        'background-color': this.options.bgColor,
                        'opacity': this.options.opacity,
                        'width': container.width(),
                        'height': container.height(),
                        'position': 'absolute',
                        'top': '0px',
                        'left': '0px',
                        'z-index': 99999
                    }).addClass('ajax_overlay');
                    // add an overiding class name to set new loader style
                    if (this.options.classOveride) {
                        overlay.addClass(this.options.classOveride);
                    }
                    // insert overlay and loader into DOM
                    container.append(
                        overlay.append(
                            jQuery('<div></div>').addClass('ajax_loader')
                        ).fadeIn(this.options.duration)
                    );
                };

                this.remove = function () {
                    var overlay = this.container.children(".ajax_overlay");
                    if (overlay.length) {
                        overlay.fadeOut(this.options.classOveride, function () {
                            overlay.remove();
                        });
                    }
                };

                this.init();
            }

        </script>
        <script>
            //trigger open windows
            (function ($) {
                $(document).ready(function () {
                    //var ajax_loader;
                    $.ajaxSetup({
                        beforeSend: function () {

                        },
                        complete: function () {
                            //$('#loader').hide();
                            //ajax_loader.remove();
                        }
                        /*
                         ,success: function() {

                         }*/
                    });
                });
            })(jQuery);
        </script>

    <?php
    }

    protected function preConfig()
    {
        parent::preConfig();
        ?>
        <script>
            // prepare the data
            MYAPP.data_port = '<?=$this->data['data_port']?>';
            MYAPP.current_obj = null;
            MYAPP.init_obj = <?=$this->data['init_obj']?>;
            //ajax_loader
            MYAPP.ajax_loader;
            MYAPP.viewModel = {};
            MYAPP.is_insert = true;
            MYAPP.manual_no = true;
            MYAPP.page_choose_mode = '<?=$this->data['role']?>';
        </script>
    <?php
    }

    private function lookupWindowLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //init window for lookup
                    $('#jqxlookupwin').jqxWindow({
                        showCollapseButton: true,
                        maxHeight: 9999,
                        maxWidth: 9999,
                        minHeight: 200,
                        minWidth: 200,
                        height: '99%',
                        width: '99%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });

                    //init window for editor
                    $('#jqxwptexteditor').jqxWindow({
                        showCollapseButton: false,
                        //maxHeight: 600,
                        //maxWidth: 1020,
                        minHeight: 200,
                        minWidth: 200,
                        height: '80%',
                        width: '100%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });
                    //Auto TinyMCE Editor resize
                    $('#jqxwptexteditor').on('resized', function (event) {
                        setTimeout(MYAPP.WPEditor.resize, 500, undefined, $(this).height() - 220);
                    });
                    $('#jqxwptexteditor').on('open', function (event) {
                        setTimeout(MYAPP.WPEditor.resize, 500, undefined, $(this).height() - 220);
                    });

                });
                MYAPP.WPEditor = {};
                MYAPP.WPEditor.resize = function (width, height) {
                    if (wptexteditor_ifr != undefined) {
                        if (height != undefined) {
                            wptexteditor_ifr.style.height = (height) + 'px';//quocdunginfo
                        }
                        if (width != undefined) {
                            wptexteditor_ifr.style.width = (width) + 'px';//quocdunginfo
                        }
                    }
                    else {
                        console.log('ERROR: wptexteditor_ifr is not defined');
                    }
                };
                MYAPP.WPEditor.setContent = function (initVal) {
                    var ins = tinyMCE.get('wptexteditor');
                    if (ins != undefined) {
                        tinyMCE.get('wptexteditor').setContent(initVal);
                    }
                }
            })(jQuery);
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="jqxlookupwin" style="display: none">
            <div id="windowHeader">
                    <span>
                        Lookup Window
                    </span>
            </div>
            <div style="overflow: hidden;">
                <iframe id="windowFrame" src="" frameborder="0" marginwidth="0" marginheight="0" scrolling="auto"
                        width="100%" height="100%">
                    <p>Your browser does not support iframes</p>
                </iframe>
            </div>
        </div>
        <div id="jqxwptexteditor">
            <div id="windowHeader">
                    <span>
                        WYSIWYG Editor Window
                    </span>
            </div>
            <div style="overflow: hidden;" id="wptexteditor_wrapper">
                <div>
                    <button type="button" id="wptexteditor_done" class="btn btn-primary btn-xs qd-action-btn">
                        <?= Qdmvc_Message::getMsg('btn_wpeditordone') ?>
                    </button>
                </div>
                <div style="margin-top: 10px">
                    <?php wp_editor('', 'wptexteditor', $settings = array()); ?>
                </div>

                <script>
                    MYAPP.wptexteditor_returnid = 'notset';
                    (function ($) {
                        $(document).ready(function () {
                            $('#wptexteditor_done').click(function () {
                                var content = tinyMCE.get('wptexteditor').getContent();
                                $('#' + MYAPP.wptexteditor_returnid).val(content);
                                $('#' + MYAPP.wptexteditor_returnid).trigger('change');
                                //close editor
                                $('#jqxwptexteditor').jqxWindow('close');
                            });
                        });
                    })(jQuery);
                    MYAPP.requestEditorWindow = function (initVal, returnId) {
                        (function ($) {
                            MYAPP.wptexteditor_returnid = returnId;
                            console.log('WYSIWYG opened, returnId: ' + MYAPP.wptexteditor_returnid);
                            $('#jqxwptexteditor').jqxWindow('open');
                            setTimeout(MYAPP.WPEditor.setContent, 200, initVal);
                        })(jQuery);
                    }
                </script>
            </div>
        </div>
    <?php
    }

    private function lookupDatePickerLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //init window for lookup
                    $('#jqxdatepickerwin').jqxWindow({
                        showCollapseButton: true,
                        maxHeight: 9999,
                        maxWidth: 9999,
                        minHeight: 200,
                        minWidth: 200,
                        height: '60%',
                        width: '50%',
                        autoOpen: false,
                        isModal: true,
                        initContent: function () {
                            //$('#tab').jqxTabs({ height: '100%', width:  '100%' });
                            //$('#window').jqxWindow('focus');
                        }
                    });

                });
            })(jQuery);
        </script>

        <div id="jqxdatepickerwin">
            <div id="windowHeader">
                    <span>
                        DatePicker Window
                    </span>
            </div>
            <div style="overflow: hidden;" id="windowContent">
                <div style="position: relative">
                    <button id="datepicker_chooser" type="button" class="btn btn-primary btn-xs">Choose</button>
                    <br>
                    <input type='text' id='qddatepicker' name="qddatepicker"/>
                    <script type="text/javascript">
                        (function ($) {
                            $(document).ready(function () {
                                // Create a jqxDateTimeInput
                                $('#qddatepicker').datetimepicker(
                                    {format: 'DD/MM/YYYY', inline: true, keepOpen: true}
                                );

                                $('#datepicker_chooser').click(function () {
                                    $('#' + MYAPP.datepicker_tmp_return_id).val($('#qddatepicker').val());
                                    $('#' + MYAPP.datepicker_tmp_return_id).trigger('change');
                                    $('#jqxdatepickerwin').jqxWindow('close');
                                });
                            });
                        })(jQuery);
                    </script>
                </div>

            </div>
        </div>
    <?php
    }

    protected function externalGateway()
    {
        ?>
        <script>
            MYAPP.validateCardForm = function () {
                //force knockout binding
                (function ($) {
                    $('#cardForm input').trigger('change');
                    $('#cardForm select').trigger('change');
                })(jQuery);
            };
            MYAPP.getObj = function () {
                //validate change all field
                MYAPP.validateCardForm();
                return ko.toJS(MYAPP.viewModel);
            };
            //gate way to comunicate with parent windows
            MYAPP.setObj = function (obj) {//do not change func name
                MYAPP.is_insert = false;
                MYAPP.manual_no = false;
                MYAPP.clearFormValidationMark();
                ko.mapping.fromJS(obj, MYAPP.viewModel);
                MYAPP.validateCardForm();
            };
            MYAPP.setLookupResult = function (value, txtId) {
                (function ($) {
                    eval('MYAPP.viewModel.' + txtId)(value);
                    //auto close window
                    $('#jqxlookupwin').jqxWindow('close');
                })(jQuery);
            }
        </script>
    <?php
    }

    private function msgPanelLayout()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //register notification
                    $("#jqxMsg").jqxNotification({
                        width: 400,
                        position: "bottom-right",
                        opacity: 0.9,
                        autoOpen: false,
                        animationOpenDelay: 300,
                        autoClose: true,
                        autoCloseDelay: 5000,
                        template: "info",
                        appendContainer: "#jqxMsgContainer"
                    });
                });
            })(jQuery);
        </script>

        <div id="jqxMsg">
            <span id="jqxMsgContent"></span>
        </div>
        <div style="position: fixed; bottom: 0px; right: 0px;">
            <div id="jqxMsgContainer">

            </div>
            <script>
                (function ($) {
                    $(document).ready(function () {
                        //register notification
                        //card button event
                        $("#qdmsgclear").bind("click", function (event) {
                            $('#jqxMsg').jqxNotification('closeAll');
                        });
                        $("#qdmsghistory").bind("click", function (event) {
                            MYAPP.showMsgHistory();
                        });
                    });
                })(jQuery);
            </script>

            <button style="opacity: 0.8;" id="qdmsgclear" class="btn btn-info btn-xs pull-right">Hide</button>
            <button style="opacity: 0.8; margin-right: 10px" id="qdmsghistory" class="btn btn-info btn-xs pull-right">
                MSG
            </button>

            <!-- Single button
            <div class="btn-group dropup pull-right">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                    Help <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#" id="tourPageCardNewRecord">New record ?</a></li>
                    <li class="divider"></li>
                </ul>
            </div> -->
            <div style="clear: both"></div>
        </div>
    <?php
    }

    private function generateFieldTextMultiValue($f_name, $f_val, $f_dataport, $f_multivaluefield = 'id', $readonly = false)
    {
        ?>
        <input data-qddataport="<?= $f_dataport ?>" <?= $readonly == true ? 'readonly' : '' ?> class="text-input"
               type="text" name="<?= $f_name ?>"
               id='<?= static::$ctl_prefix . $f_name ?>'
               data-bind="jqxInput: {value: <?= $f_name ?>}"/>
        <script>
            (function ($) {
                if (MYAPP.MultiValueSource_<?=$f_name?> === undefined) {
                    MYAPP.MultiValueSource_<?=$f_name?> = new Array();
                }

                $(document).ready(function () {
                    // prepare the data
                    var source =
                    {
                        datatype: "json",
                        datafields: [
                            {name: '<?=$f_multivaluefield?>'}
                        ],
                        url: '<?=$f_dataport?>' + '&recordstartindex=0&recordendindex=9999&pagesize=9999'
                    };

                    var dataAdapter = new $.jqx.dataAdapter(source, {
                        autoBind: true, loadComplete: function (data) {
                            for (var i = 0; i < data.rows.length; i++) {
                                MYAPP.MultiValueSource_<?=$f_name?>.push(data.rows[i].<?=$f_multivaluefield?>);
                            }
                        }
                    });

                    // Create a jqxInput
                    $("#ctl_<?=$f_name?>").jqxInput({
                        source: dataAdapter,
                        source: function (query, response) {
                            var item = query.split(/,\s*/).pop();

                            if (item.trim() === '*') {
                                // update the search query.
                                $("#ctl_<?=$f_name?>").jqxInput({query: ''});
                            }
                            else if (item.trim().length < 1) {
                                // update the search query.
                                $("#ctl_<?=$f_name?>").jqxInput({query: new Date()});
                            } else {
                                // update the search query.
                                $("#ctl_<?=$f_name?>").jqxInput({query: item});
                            }

                            response(MYAPP.MultiValueSource_<?=$f_name?>);
                        },
                        renderer: function (itemValue, inputValue) {
                            var terms = inputValue.split(/,\s*/);
                            // remove the current input
                            terms.pop();
                            // add the selected item
                            terms.push(itemValue);
                            // add placeholder to get the comma-and-space at the end
                            terms.push("");
                            return terms.join(", ");
                        },
                        placeHolder: 'Auto complete field...'
                    });
                });
            })(jQuery);

        </script>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#<?=static::$ctl_prefix.$f_name?>").hover(function () {
                        var lv = $(this).val();
                        if (lv != "") {
                            var content = '<div style="max-width: 150px; max-height: 150px"/>' + lv + '</div>';
                            var selector = $(this);
                            selector.jqxTooltip({content: content, position: 'bottom', opacity: 0.9});
                            selector.jqxTooltip('open');
                        }
                    });
                });
            })(jQuery);
        </script>
    <?php
    }

    private function generateFieldLookup($f_name, $f_val, $f_lku, $f_dataport, $readonly = false)
    {
        if ($readonly) {
            $this->generateFieldText($f_name, $f_val, $readonly);
            return;
        }
        $placeHolder = $f_dataport==''?'':'Press F3 to search...';
        ?>
        <div class="qd-lookup-input">
            <input data-qddataport="<?= $f_dataport ?>" <?= $readonly == true ? 'readonly' : '' ?> class="text-input"
                   type="text" name="<?= $f_name ?>"
                   id='<?= static::$ctl_prefix . $f_name ?>'
                   data-bind="jqxInput: {value: <?= $f_name ?>, placeHolder: '<?=$placeHolder?>'}" autocomplete="off"/>
            <button onclick='MYAPP.requestLookupWindow("<?= $f_lku ?>")'
                    data-lookupurl="<?= $f_lku ?>" id="lookup_cs_<?= $f_name ?>"
                    value="">...
            </button>
        </div>
        <script>
            MYAPP.autoCompleteDone = false;
            (function ($) {
                $(document).ready(function () {

                    $("#<?=static::$ctl_prefix.$f_name?>").on('keydown', function (e) {
                        if (e.keyCode == 114) {//F3
                            if (MYAPP.autoCompleteDone == true) {
                                return;
                            }
                            MYAPP.autoCompleteDone = true;

                            MYAPP.ajax_loader = new ajaxLoader("#cardForm");

                            var datasource = [];
                            //get data from data port
                            var keyword = $.trim($(this).val());
                            var dpu = MYAPP.addDataPortFilter($(this).data('qddataport'), 0, 'id', keyword, 'CONTAINS');
                            console.log(dpu);
                            $.post(dpu, {})
                                .done(function (data) {
                                    try {
                                        datasource = [];

                                        data.rows.forEach(function (entry) {
                                            datasource.push(entry.id);
                                        });

                                        console.log(datasource);
                                        //map to source
                                        $("#<?=static::$ctl_prefix.$f_name?>").jqxInput({
                                            source: datasource
                                        });
                                        MYAPP.autoCompleteDone = true;
                                    } catch (error) {
                                        console.log(error);
                                    }
                                })
                                .fail(function (data) {
                                    console.log(data);
                                })
                                .always(function () {
                                    MYAPP.ajax_loader.remove();
                                    MYAPP.autoCompleteDone = false;
                                });
                        }

                    });
                });
            })(jQuery);

        </script>
    <?php
    }

    private function generateFieldDate($f_name, $value, $readonly = false)
    {
        if ($readonly == true) {
            $this->generateFieldText($f_name, $value, $readonly);
            return;
        }
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" id='<?= static::$ctl_prefix . $f_name ?>'
                   data-bind="jqxInput: {value: <?= $f_name ?>}"/>
            <button onclick='MYAPP.requestDatePickerWindow("<?= static::$ctl_prefix . $f_name ?>")'
                    id="datepicker_cs_<?= $f_name ?>">...
            </button>
        </div>
    <?php
    }

    private function generateFieldText($f_name, $value, $readonly = false)
    {
        ?>
        <input <?= $readonly == true ? 'readonly' : '' ?> class="text-input" type="text" name="<?= $f_name ?>"
                                                          id='<?= static::$ctl_prefix . $f_name ?>'
                                                          data-bind="jqxInput: {value: <?= $f_name ?>}"/>
        <?php if (true || $readonly): ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#<?=static::$ctl_prefix.$f_name?>").hover(function () {
                        var lv = $(this).val();
                        if (lv != "") {
                            var content = '<div style="max-width: 150px; max-height: 150px"/>' + lv + '</div>';
                            var selector = $(this);
                            selector.jqxTooltip({content: content, position: 'bottom', opacity: 0.9});
                            selector.jqxTooltip('open');
                        }
                    });
                });
            })(jQuery);
        </script>
    <?php endif; ?>
    <?php
    }

    private function generateFieldInteger($f_name, $value, $readonly = false)
    {
        ?>
        <input <?= $readonly == true ? 'readonly' : '' ?> class="text-input" type="text" name="<?= $f_name ?>"
                                                          id='<?= static::$ctl_prefix . $f_name ?>'
                                                          data-bind="jqxInput: {value: <?= $f_name ?>}"/>
    <?php
    }

    private function generateFieldColor($f_name, $value, $readonly = false)
    {
        ?>
        <input class="text-input color {hash:true, required:false}" type="text" name="<?= $f_name ?>"
               id="<?= static::$ctl_prefix . $f_name ?>" data-bind="value: <?= $f_name ?>">
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#<?=static::$ctl_prefix.$f_name?>").on('change', function () {
                        this.color.fromString(this.value);
                    });
                });
            })(jQuery);
        </script>

    <?php
    }

    private function generateFieldHidden($f_name, $value, $readonly = false)
    {
        ?>
        <input type="hidden" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>'
               data-bind="value: <?= $f_name ?>"/>
    <?php
    }

    private function generateFieldCombobox($f_name, $value, $options, $readonly = false)
    {
        ?>
        <select class="qd-option-field" name="<?= $f_name ?>"
                id="<?= static::$ctl_prefix . $f_name ?>" <?= $readonly ? 'disabled' : '' ?>
                data-bind="value: <?= $f_name ?>">
            <?php foreach ($options as $key => $caption): ?>
                <option value="<?= $key ?>"><?= $caption ?></option>
            <?php endforeach; ?>
        </select>
    <?php
    }

    private function generateFieldImage($f_name, $value, $readonly = false)
    {
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>'
                   data-bind="jqxInput: {value: <?= $f_name ?>}"/>

            <button type="button" id="media_cs_<?= $f_name ?>" value="">...</button>

            <script>
                (function ($) {
                    $(document).ready(function () {
                        //register media chooser
                        $('#media_cs_<?=$f_name?>').live('click', function (event) {
                            //event.preventDefault();
                            MYAPP.MediaSelector.open('media_cs_<?=$f_name?>', '<?=$f_name?>');
                        });
                        //hover effect
                        $("#<?=static::$ctl_prefix.$f_name?>").hover(function () {
                            var imgURL = $(this).val();
                            if (imgURL != "") {
                                var content = '<img style="max-width: 150px; max-height: 150" src="' + imgURL + '" />';
                                var selector = $("#<?=static::$ctl_prefix.$f_name?>");
                                selector.jqxTooltip({content: content, position: 'bottom', opacity: 0.8});
                                selector.jqxTooltip('open');
                            }
                        });
                    });
                })(jQuery);
            </script>
        </div>

    <?php
    }

    private function generateFieldImagePreview($f_name, $value, $previewfield, $readonly = false)
    {
        ?>
        <div class="qd-image-preview">
            <img id='<?= static::$ctl_prefix . $f_name ?>'
                 data-bind="attr:{src: <?= $previewfield ?>}"/>
        </div>

    <?php
    }

    private function generateFieldBoolean($f_name, $value = 0, $readonly = false)
    {
        $ros = $readonly ? 'onclick="return false;"' : '';
        ?>
        <!--<input type="checkbox" name="<?= $f_name ?>" id="<?= static::$ctl_prefix . $f_name ?>" value="1">-->
        <input type="checkbox" data-bind="checked: <?= $f_name ?>" name="<?= $f_name ?>"
               id="<?= static::$ctl_prefix . $f_name ?>" value="1" <?= $ros ?> />
    <?php
    }

    private function generateFieldWYSIWYG($f_name, $value = 0, $readonly = false)
    {
        ?>
        <div class="qd-lookup-input">
            <input class="text-input" type="text" name="<?= $f_name ?>" id='<?= static::$ctl_prefix . $f_name ?>'
                   data-bind="jqxInput: {value: <?= $f_name ?>}"/>

            <button id="editor_cs_<?= $f_name ?>" value="">...</button>

            <script>
                (function ($) {
                    $(document).ready(function () {
                        $("#editor_cs_<?=$f_name?>").click(function () {
                            MYAPP.requestEditorWindow($('#<?=static::$ctl_prefix.$f_name?>').val(), '<?=static::$ctl_prefix.$f_name?>');
                        });
                    });
                })(jQuery);
            </script>
        </div>
    <?php
    }

    private function generateFields()
    {
        $tmp_page = $this->page;
        ?>
        <style>
            .qd-card-grid .col-md-6 {
                /*height: 30px;*/
                margin-bottom: 7px;
            }

            .qd-card-grid .qd-option-field {
                height: 24px;
            }

            .qd-card-grid .qd-field-caption {
                height: 100%;
                width: 40%;
            }

            .qd-card-grid input[type=text] {
                display: block;
                width: 250px;
                height: 24px;
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }

            .qd-card-grid .qd-image-preview {
                width: 250px;
                height: 100px;
                text-align: center;
                vertical-align: middle;
            }

            .qd-card-grid .qd-image-preview img {
                display: block;
                max-height: 100px;
                max-width: 250px;
                margin: 0 auto;
                border: solid black 1px;
            }

            .qd-lookup-input {
                position: relative;
            }

            .qd-lookup-input input {
                padding-right: 35px !important;
            }

            .qd-lookup-input button {
                position: absolute;
                top: 0;
                right: 0;
            }
        </style>
        <div class="container qd-card-grid" style="width: 100%">
            <div class="row clearfix" style="overflow-x: hidden">
                <script type="text/javascript">
                    (function ($) {
                        $(document).ready(function () {
                            $('#jqxTabs').jqxTabs({width: '100%', position: 'top'});
                        });
                    })(jQuery);

                </script>
                <div id='jqxTabs'>
                    <ul>
                        <?php
                        foreach ($tmp_page::getLayout() as $group => $config) :
                            ?>
                            <li>
                                <?= $tmp_page::getTabConfig($group, 'Name', $this->data['language']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php
                    foreach ($tmp_page::getLayout() as $group => $config) :
                        if (isset($config['Type']) && $config['Type'] == 'Group') :
                            echo '<div>';
                            if (isset($config['Fields'])) :
                                foreach ($config['Fields'] as $key => $f_config) :
                                    $type = $tmp_page::getDataType($key);

                                    $readonly = $tmp_page::isReadOnly($key);
                                    $readonly = Qdmvc_Helper::isNullOrEmpty($readonly) ? false : true;

                                    $f_name = $tmp_page::getSourceExpr($key);
                                    if ($type == 'Option') {
                                        $options = $tmp_page::getFieldOptions($f_name, $this->data['language']);
                                    }
                                    if ($type == 'ImagePreview') {
                                        $imagepreviewfield = $tmp_page::getImagePreview($key);
                                    }
                                    $f_val = '';
                                    $f_lku = $tmp_page::getLookupURL($f_name);
                                    $f_dataport = $tmp_page::getFieldDataPort($f_name);
                                    if($f_dataport!=''){
                                        $f_dataport = Qdmvc_Helper::getDataPortPath($f_dataport);
                                    }

                                    $f_multivalue = $tmp_page::isMultiValue($key);
                                    if ($f_multivalue) {
                                        $f_multivaluefield = $tmp_page::getMultiValueField($f_name);
                                        $f_multivaluedataport = $tmp_page::getMultiValueDataPort($f_name);
                                    }

                                    if ($f_config['Hidden']) {
                                        $this->generateFieldHidden($f_name, $f_val);
                                        continue;
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <!-- Caption -->
                                        <div
                                            data-qddesc="<?= $this->page->getFieldDescription($f_name, $this->data['language']) ?>"
                                            class="qd-field-caption pull-left"><?= $this->page->getFieldCaption($f_name, $this->data['language']) ?>
                                            :
                                        </div>
                                        <!-- END Caption -->
                                        <div class="pull-right">
                                            <?php
                                            if ($type == 'Color') {
                                                $this->generateFieldColor($f_name, $f_val, $readonly);
                                            } else if ($type == 'Boolean') {
                                                $this->generateFieldBoolean($f_name, $f_val, $readonly);
                                            } else if ($type == 'Image') {
                                                $this->generateFieldImage($f_name, $f_val, $readonly);
                                            } else if ($type == 'ImagePreview') {
                                                $this->generateFieldImagePreview($f_name, $f_val, $imagepreviewfield, $readonly);
                                            } else if ($type == 'Integer') {
                                                $this->generateFieldInteger($f_name, $f_val, $readonly);
                                            } else if ($type == 'Date') {
                                                $this->generateFieldDate($f_name, $f_val, $readonly);
                                            } else if ($type == 'WYSIWYG') {
                                                $this->generateFieldWYSIWYG($f_name, $f_val, $readonly);
                                            } else if ($type == 'Option') {
                                                $this->generateFieldCombobox($f_name, $f_val, $options, $readonly);
                                            } else if ($f_multivalue) {
                                                $this->generateFieldTextMultiValue($f_name, $f_val, $f_multivaluedataport, $f_multivaluefield, $readonly);
                                            } else if (!Qdmvc_Helper::isNullOrEmpty($f_lku)) {
                                                $this->generateFieldLookup($f_name, $f_val, $f_lku, $f_dataport, $f_multivalue, $readonly);
                                            } else {
                                                $this->generateFieldText($f_name, $f_val, $readonly);
                                            }
                                            ?>
                                        </div>

                                        <div style="clear: both"></div>

                                    </div>
                                <?php
                                endforeach;
                            endif;
                            echo '</div>';
                        endif;
                    endforeach;
                    ?>
                </div>

            </div>
        </div>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $('.qd-field-caption').dblclick(function () {
                        var content = $(this).data('qddesc');
                        var title = $(this).text();
                        MYAPP.showModalDialog(title, content);
                    });
                });
            })(jQuery);
        </script>
    <?php
    }

    protected function onReadyHook()
    {
        parent::onReadyHook();
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    <?php if($this->page->hasLines()): ?>
                    $("#qdlines").show();
                    <?php endif; ?>

                    $('#ctl_id').keyup(function () {
                        MYAPP.manual_no = true;
                    });
                });
            })(jQuery);
        </script>
    <?php

    }

    private function applyKOBinding()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    <?php if($this->page->hasLines()): ?>
                    $("#qdlines").show();
                    <?php endif; ?>

                    MYAPP.viewModel = ko.mapping.fromJS(MYAPP.init_obj);
                    ko.applyBindings(MYAPP.viewModel); // This makes Knockout get to work

                    $('#ctl_id').keyup(function () {
                        MYAPP.manual_no = true;
                    });
                });
            })(jQuery);
        </script>
    <?php
    }

    protected function onDeleteOK()
    {

    }

    protected function onCloneOK()
    {

    }

    protected function onNewOK()
    {

    }

    /*
    private function linesBar()
    {
        ?>
        <div>
            <div style='margin-top: 2px;'>
                <div style='margin-left: 4px; float: left;'>
                    Lines
                </div>
            </div>
        </div>
        <div>
            <div style="height: 520px; width: 100%">
                <!-- Content Place Holder 2 -->
                <iframe id="pagepart" src="<?= $this->getPagePartURL() ?>"
                        width="100%" height="99%" scrolling="no" frameborder="0">
                    <p>Your browser does not support iframes</p>
                </iframe>
                <!-- ENd Content Place Holder 2 -->
            </div>
        </div>
    <?php
    }*/

    private function cardBar()
    {
        ?>

        <div>
            <div style='margin-top: 2px;'>
                <div style='margin-left: 4px; float: left;'>
                    Card
                </div>
            </div>
        </div>
        <div>
            <div>
                <script>
                    (function ($) {
                        $(document).ready(function () {
                            //validate trigger
                            $("#cardForm").on("validationSuccess", function (event) {
                                //AJAX progress Bar
                                MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                                //build data
                                var json = MYAPP.getObj();//form2js("cardForm", ".", false, null, true);//skip empty some time cause lack field
                                //begin lock
                                console.log(json);
                                var action = MYAPP.is_insert ? "insert" : "update";
                                var postdata = {
                                    submit: "submit",
                                    action: action,
                                    data: json,
                                    manual_no: MYAPP.manual_no
                                };
                                console.log(postdata);
                                $.post(MYAPP.data_port, postdata)
                                    .done(function (data) {
                                        //data JSON
                                        console.log(data);
                                        //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                        console.log(data.rows[0]);

                                        MYAPP.clearFormValidationMark();
                                        MYAPP.setObj(data.rows[0]);

                                        MYAPP.formValidation = data.msg;
                                        //tracking insert fail
                                        if (data.working_mode == 'insert_fail') {
                                            MYAPP.is_insert = true;//manual noseries insert but fail
                                        }
                                        //show error msg
                                        MYAPP.showMsg(data.msg);//must be called after setObj(...)

                                        <?=$this->onSaveOK()?>
                                    })
                                    .fail(function (data) {
                                        console.log(data);
                                    })
                                    .always(function () {
                                        //release lock
                                        MYAPP.ajax_loader.remove();
                                    });
                            });

                            //card form event
                            $("#qdupdate").bind("click", function (event) {
                                $("#cardForm").jqxValidator("validate");
                            });

                            //card button event
                            $("#qdnew").bind("click", function (event) {
                                //To disable
                                try {
                                    //document.getElementById("cardForm").reset();
                                    //set init obj
                                    MYAPP.setObj(MYAPP.init_obj);
                                    //force set id = 0
                                    MYAPP.viewModel.id(0);
                                    MYAPP.is_insert = true;

                                    <?=$this->onNewOK()?>
                                } catch (error) {
                                    console.log(error);
                                }
                            });

                            //card button event
                            $("#qdclone").bind("click", function (event) {
                                if (!confirm("<?=Qdmvc_Message::getMsg('msg_confirm')?>")) {
                                    return false;
                                }

                                MYAPP.viewModel.id(0);
                                MYAPP.is_insert = true;
                                MYAPP.manual_no = false;
                                $("#qdupdate").click();

                                <?=$this->onCloneOK()?>
                            });

                            //card button event
                            $("#qdnote").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_note_url']);
                            });
                            $("#qdimage").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_image_url']);
                            });
                            //card button event
                            $("#qdlog").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_log_url']);
                            });
                            $("#qdlines").bind("click", function (event) {
                                MYAPP.requestLookupWindow(MYAPP.getObj()['__sys_lines_url']);
                            });

                            $("#qdreloadcard").bind("click", function (event) {
                                MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                                location.reload();
                            });
                            $("#qdhelp").bind("click", function (event) {
                                var content = '<?=addslashes($this->page->getFieldsHelp($this->data['language']))?>';
                                var title = '<?=Qdmvc_Message::getMsg('help')?>';
                                MYAPP.showModalDialog(title, content);
                            });

                            //prevent form enter key
                            $("#cardForm").keypress(function (e) {
                                if (e.which == 13) { // Checks for the enter key
                                    e.preventDefault(); // Stops IE from triggering the button to be clicked

                                    //simulate save click
                                    $('#qdupdate').focus();//knock out js only update value to model after lose focus
                                    $("#qdupdate").click();
                                }
                            });
                            //catch submit
                            $(document).on("submit", "#testForm", function () {
                                // code
                                return false;
                            });
                        });
                    })(jQuery);
                </script>
                <?= $this->btnDeleteAction() ?>
                <form style="width: 100%" id="cardForm" action=""
                      onsubmit="return false">
                    <div>

                        <hr style="margin-top: 5px; margin-bottom: 5px; display: none">
                        <!-- Content place Holder -->
                        <?= $this->generateFields() ?>
                        <!-- End content place holder -->

                    </div>
                </form>
            </div>
        </div>
    <?php
    }

    protected function btnDeleteAction()
    {
        ?>
        <script>
            (function ($) {
                $(document).ready(function () {
                    $("#qddelete").bind("click", function (event) {
                        if (!confirm("Xác nhận ?")) {
                            return false;
                        }
                        //AJAX loader
                        MYAPP.ajax_loader = new ajaxLoader("#cardForm");
                        //begin lock
                        var id_ = MYAPP.viewModel.id();
                        console.log(id_);
                        $.post(MYAPP.data_port, {submit: "submit", action: "delete", data: {id: id_}})
                            .done(function (data) {
                                //data JSON
                                //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format
                                MYAPP.formValidation = data.msg;
                                //....
                                MYAPP.showMsg(data.msg);

                                <?=$this->OnDeleteOK()?>
                            })
                            .fail(function (data) {
                                console.log("FAIL:" + data);
                            })
                            .always(function () {
                                //release lock
                                MYAPP.ajax_loader.remove();
                            });
                    });
                })
            })(jQuery);

        </script>
    <?php
    }

    protected function onSaveOK()
    {

    }

    protected function onCallFnOK()
    {

    }

    protected function Bars()
    {
        $this->cardBar();
        return;
        $tmp_page = $this->page;

        //render Page Part from Page Setup
        foreach ($tmp_page::getLayout() as $group => $config) :
            if (isset($config['Type']) && $config['Type'] == 'Part'):
                ?>
                <div>
                    <div style='margin-top: 2px;'>
                        <div style='margin-left: 4px; float: left;'>
                            Part
                        </div>
                    </div>
                </div>
                <div>
                    <div style="height: 520px; width: 100%">
                        <iframe id="pagePart_<?= $group ?>" src="<?= $this->page->getPagePartURL() ?>" frameborder="0"
                                marginwidth="0" marginheight="0" scrolling="auto"
                                width="100%" height="100%">
                            <p>Your browser does not support iframes</p>
                        </iframe>
                    </div>
                </div>
            <?php
            endif;
        endforeach;
    }

    private function Bar()
    {
        ?>

        <div style="margin-top: 5px; margin-bottom: 5px">

            <style>
                .qd-action-btn {
                    margin-right: 20px;
                }

                .glyphicon {
                    font-size: 18px;
                }
            </style>
            <?=$this->generateToolbar()?>

            <?= $this->render_serverFunctions() ?>


        </div>
        <div id='jqxWidget'>
            <div id="jqxNavigationBar">
                <?= $this->Bars() ?>
            </div>
        </div>
        <script>
            (function ($) {
                $(document).ready(function () {
                    //navigation bar
                    $("#jqxNavigationBar").jqxNavigationBar({
                        width: '100%',
                        expandMode: 'multiple',
                        expandedIndexes: [0, 1, 2]
                    });
                });
            })(jQuery);
        </script>

    <?php
    }

    protected function getHelpTourPipes()
    {
        return array(
            '#tourPageCardNewRecord' => array(
                '#qdnew' => 20,
                '#cardForm' => 40,
                '#qdupdate' => 60,
            ),
        );
    }

    protected function getHelpTourNodes()
    {
        //range 1 => 2999
        return array(
            20 => array(
                'Caption' => array(
                    'en-US' => 'Create new record for input (but NOT saved yet)',
                    'vi-VN' => 'Tạo mới một record để nhập liệu (tuy nhiên KHÔNG lưu)'
                )
            ),
            40 => array(
                'Caption' => array(
                    'en-US' => 'Input record property',
                    'vi-VN' => 'Nhập liệu cho từng thuộc tính'
                )
            ),
            60 => array(
                'Caption' => array(
                    'en-US' => 'Press Save button',
                    'vi-VN' => 'Click nút lưu'
                )
            ),
            80 => array(
                'Caption' => array(
                    'en-US' => 'Focus on this area to see new added record',
                    'vi-VN' => 'Quan sát ở đây để thấy record mới thêm'
                )
            ),
            100 => array(
                'Caption' => array(
                    'en-US' => 'Notification area, validation msg will raise beside here, click to clear msgs',
                    'vi-VN' => 'Khi lưu, các thông báo lỗi (nếu có) sẽ xuất hiện ở đây'
                )
            ),
            101 => array(
                'Caption' => array(
                    'en-US' => 'Validation also marked on each field which cause error',
                    'vi-VN' => 'Đồng thời cũng sẽ đánh dấu trên Form các Field gây lỗi (màu viền: đỏ (lỗi), vàng (cảnh báo), xanh(dữ liệu tự động gán),...)'
                )
            )
        );
    }

    private $sample_serverfns =
        array(
            'id1' => array(
                'fn_name' => 'action1',
                'label' => 'button_name1'
            ),
            'id2' => array(
                'fn_name' => 'action2',
                'label' => 'button_name2'
            ),
        );

    protected function serverFunctions()
    {
        return array();
    }

    protected function callFnAction()
    {
        ?>
        <script>
            MYAPP.callFn = function (fn_name, params, on_done_fn, on_fail_fn, on_final_fn, passing_obj) {
                (function ($) {
                    //AJAX progress Bar
                    MYAPP.ajax_loader = new ajaxLoader("#cardForm");


                    //build data
                    var json = {id: MYAPP.viewModel.id()};//form2js("cardForm", ".", false, null, true);//skip empty some time cause lack field
                    //begin lock
                    var action = 'call_fn';
                    if (passing_obj === true) {
                        action = 'call_fn_passing';
                        json = MYAPP.getObj();
                    }

                    var postdata = {submit: "submit", action: action, function: fn_name, data: json, params: params};
                    console.log(postdata);
                    $.post(MYAPP.data_port, postdata)
                        .done(function (data) {
                            //data JSON
                            console.log(data);
                            //var obj = data;//"ok";//jQuery.parseJSON( data );//may throw error if data aldreay JSON format

                            MYAPP.clearFormValidationMark();
                            MYAPP.setObj(data.rows[0]);

                            MYAPP.formValidation = data.msg;
                            MYAPP.showMsg(data.msg);//must be called after setObj(...)

                            <?=$this->onCallFnOK()?>
                            if (on_done_fn != undefined) {
                                on_done_fn(data);
                            }
                        })
                        .fail(function (data) {
                            console.log(data);
                            if (on_fail_fn != undefined) {
                                on_fail_fn(data);
                            }
                        })
                        .always(function (data) {
                            //release lock
                            MYAPP.ajax_loader.remove();
                            if (on_final_fn != undefined) {
                                on_final_fn(data);
                            }
                        });
                })(jQuery);
            }
        </script>
    <?php
    }

    private function render_serverFunctions()
    {
        if (count($this->serverFunctions()) <= 0) {
            return;
        }
        ?>
        <!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"
                    aria-expanded="false">
                <?= Qdmvc_Message::getMsg('btn_function') ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <?php
                foreach ($this->serverFunctions() as $item => $config) :
                    $fn_label = isset($config['label'][$this->data['language']]) ? $config['label'][$this->data['language']] : '@' . $item;
                    $fn_confirm = (!Qdmvc_Helper::isNullOrEmpty($config['confirm'])) && $config['confirm'] == true;
                    ?>
                    <li><a id="<?= $item ?>"><?= $fn_label ?></a></li>
                <?php
                if (!Qdmvc_Helper::isNullOrEmpty($config['fn_name']))
                {
                ?>
                    <script>
                        (function ($) {
                            $(document).ready(function () {
                                $('#<?=$item?>').click(function () {
                                    <?php if($fn_confirm) echo sprintf('if(confirm("%s"))', Qdmvc_Message::getMsg('msg_confirm')); ?>
                                    MYAPP.callFn('<?=$config['fn_name']?>');
                                });
                            });
                        })(jQuery);
                    </script>
                <?php
                }
                endforeach;
                ?>
            </ul>
        </div>
    <?php
    }

    public function render()
    {
        if ($this->data['nopermission'] === true) {
            $this->layout_nopermission();
            return;
        }
        $this->style();
        parent::render();
        ?>
        <div id="qdmvcRootDiv" style="display: none; width: inherit; height: inherit">
            <?= $this->preConfig() ?>
            <?= $this->internalGateway() ?>
            <?= $this->externalGateway() ?>

            <?= $this->formValidation() ?>
            <?= $this->progressSpinner() ?>
            <?= $this->lookupWindowLayout() ?>
            <?= $this->lookupDatePickerLayout() ?>
            <?= $this->Bar() ?>
            <?= $this->msgPanelLayout() ?>
            <?= $this->progressLoader() ?>
            <?= $this->onReadyHook() ?>
            <?= $this->applyKOBinding()//must place after onReadyHook or KO not binding to new added DOM Element      ?>
        </div>
    <?php
    }

    private function progressLoader()
    {
        return;
        ?>
        <div id="jqxloader"></div>
        <script>

            MYAPP.openLoader = function () {
                jQuery('#jqxloader').jqxLoader('open');
            };
            MYAPP.stopLoader = function () {
                jQuery('#jqxloader').jqxLoader('close');
            };
            (function ($) {
                $(document).ready(function () {
                    $("#jqxloader").jqxLoader({isModal: true, width: '100', height: '60', imagePosition: 'top'});
                });

            })(jQuery);
        </script>
    <?php
    }

    protected function getToolbar()
    {
        $obj = array(
            'qdchoose' => array(
                'Order' => 0,
                'Label' => Qdmvc_Message::getMsg('btn_choose'),
                'Hidden' => ($this->data['role'] !== 'lookup')
            ),
            'qdupdate' => array(
                'Order' => 100,
                'Label' => Qdmvc_Message::getMsg('btn_save')
            ),
            'qdnew' => array(
                'Order' => 200,
                'Label' => Qdmvc_Message::getMsg('btn_new')
            ),
            'qddelete' => array(
                'Order' => 300,
                'Label' => Qdmvc_Message::getMsg('btn_delete')
            ),
            'qdclone' => array(
                'Order' => 400,
                'Label' => Qdmvc_Message::getMsg('btn_clone')
            ),
            'qdsysbtn' => array(
                'Type' => 'Container',
                'Order' => 500,
                'Style' => 'Flat',//'Group',
                'Childs' => array(
                    'qdnote' => array(
                        'Order' => 500,
                        'Label' => array(
                            array(
                                'Type' => 'Binding',
                                'Formula' => 'text: MYAPP.getURIParam($root.__sys_note_url(),\'item_count\')'
                            ),
                            array(
                                'Type' => 'Text',
                                'Formula' => Qdmvc_Message::getMsg('btn_note')
                            )
                        )
                    ),
                    'qdimage' => array(
                        'Order' => 600,
                        'Label' => array(
                            array(
                                'Type' => 'Binding',
                                'Formula' => 'text: MYAPP.getURIParam($root.__sys_image_url(),\'item_count\')'
                            ),
                            array(
                                'Type' => 'Text',
                                'Formula' => Qdmvc_Message::getMsg('btn_image')
                            )
                        )
                    ),
                    'qdlog' => array(
                        'Order' => 600,
                        'Label' => array(
                            array(
                                'Type' => 'Binding',
                                'Formula' => 'text: MYAPP.getURIParam($root.__sys_log_url(),\'item_count\')'
                            ),
                            array(
                                'Type' => 'Text',
                                'Formula' => Qdmvc_Message::getMsg('btn_log')
                            )
                        )
                    ),
                )
            ),
            'qdreloadcard' => array(
                'Order' => 600,
                'Label' => Qdmvc_Message::getMsg('btn_reloadcard')
            ),
            'qdsysbtn2' => array(
                'Type' => 'Container',
                'Order' => 700,
                'Style' => 'Flat',//'Group',
                'Label' => 'Tiện ích',
                'Childs' => array(
                    'qdlines' => array(
                        'Order' => 100,
                        'Label' => array(
                            array(
                                'Type' => 'Binding',
                                'Formula' => 'text: MYAPP.getURIParam($root.__sys_lines_url(),\'item_count\')'
                            ),
                            array(
                                'Type' => 'Text',
                                'Formula' => $this->page->getFieldCaption('__sys_lines_url', $this->data['language'])
                            )
                        ),
                        'Hidden' => true
                    ),
                    'qdviewreport' => array(
                        'Order' => 200,
                        'Label' => Qdmvc_Message::getMsg('btn_viewreport'),
                        'Hidden' => true
                    ),
                    'qdhelp' => array(
                        'Order' => 300,
                        'Label' => '?',
                    ),
                )
            ),
            'qdpagebtn' => array(
                'Type' => 'Container',
                'Order' => 800,
                'Style' => 'Flat',
                'Childs' => array()
            )
        );
        return $obj;
    }

    private function generateToolbar()
    {

        //SORT
        $layout = $this->getToolbar();
        //apply sorting
        uasort($layout, "static::compareArray");
        foreach ($layout as $key => &$config) {
            if ($config['Type'] == 'Container' && isset($config['Childs'])) {
                uasort($config['Childs'], "static::compareArray");
            }
        }
        //end apply sorting
        foreach($layout as $key=>$config2){
            $this->genToolbarElement($key, $config2);
        }
        //END SORT
    }

    private static function compareArray($a, $b)
    {
        if (isset($a['Order']) && isset($b['Order'])) {
            if ($a['Order'] == $b['Order']) {
                return 0;
            }
            return $a['Order'] - $b['Order'];
        }
        return 0;
    }
    private function genToolbarElementLabel($key, $config){
        if (is_array($config)) {
            foreach ($config as $lbitem) {
                if (isset($lbitem['Type'])) {
                    if ($lbitem['Type'] === 'Text') {
                        echo $lbitem['Formula'];
                    } else if ($lbitem['Type'] === 'Binding') {
                        ?>
                        <span
                            data-bind="<?= $lbitem['Formula'] ?>">

                                                            </span>
                    <?php
                    }
                }
            }
        } else {
            echo $config;
        }
    }
    private function genToolbarElement($rootkey, $layout)
    {
        //Container
        if (isset($layout['Type']) && $layout['Type'] === 'Container') {
            if (isset($layout['Style'])) {
                //Group
                if ($layout['Style'] === 'Group') {
                    ?>
                    <div class="btn-group" id="">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <?= $layout['Label'] ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach ($layout['Childs'] as $key => $config): ?>
                                <li style="<?php if (isset($layout['Hidden']) && $layout['Hidden']===true) echo 'display:none;' ?>">
                                    <a id="<?= $key ?>">
                                        <?php
                                        if (isset($config['Label'])) {
                                            $this->genToolbarElementLabel($key, $config['Label']);
                                        }
                                        ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php
                } //Flat
                else {
                    ?>
                    <span id="<?= $rootkey ?>">
                        <?php foreach ($layout['Childs'] as $key => $config): ?>
                            <button class="btn btn-success btn-xs qd-action-btn" type="button" id="<?= $key ?>" style="<?php if (isset($config['Hidden']) && $config['Hidden']===true) echo 'display:none;' ?>">
                                <?php
                                if (isset($config['Label'])) {
                                    $this->genToolbarElementLabel($key, $config['Label']);
                                }
                                ?>
                            </button>
                        <?php endforeach; ?>
                    </span>
                <?php
                }
            }
        } //Button
        else {
            ?>
            <span style="<?php if (isset($layout['Hidden']) && $layout['Hidden']===true) echo 'display:none;' ?>">
                <button class="btn btn-primary btn-xs qd-action-btn" type="button" id="<?=$rootkey?>">
                    <?=$this->genToolbarElementLabel($rootkey, $layout['Label'])?>
                </button>
            </span>
            <?php
        }
    }
}