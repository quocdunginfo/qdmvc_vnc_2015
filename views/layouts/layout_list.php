<?php
/**
 * Created by PhpStorm.
 * User: quocd_000
 * Date: 08/02/2015
 * Time: 11:32 PM
 */
Qdmvc::loadLayout('layout_root');

class Qdmvc_Layout_List extends Qdmvc_Layout_Root
{
    function __construct($page)
    {
        parent::__construct($page);
    }

    protected function preConfig()
    {
        parent::preConfig();
        ?>
        <script>
            // prepare the data
            MYAPP.data_port = '<?=$this->data['data_port']?>';//quocdunginfo
            MYAPP.page_navigate = '<?=$this->data['page_navigate']?>';
        </script>
    <?php
    }

    protected function generateFields()
    {
        ?>
        <script>
            var defaultline = {};
            var dataSourceDefine = [
                <?php
                $c = $this->page->getModel();
                foreach($c::getFieldsConfig() as $key=>$config) {
                    ?>
                {name: '<?=$key?>', type: 'string'},
                <?php
            }
            ?>
            ];
            var cellbeginedit = function (row, datafield, columntype, value) {
                //check field can edit when linked to Header page

                return true;
            };

            var dataGridDefine = [
                <?php
                    $tmp_page = $this->page;
                    foreach($tmp_page::getLayout() as $key=>$config)//quocdunginfo
                    {
                        $f_name = $tmp_page::getSourceExpr($key);
                        $caption = $tmp_page->getFieldCaption($f_name, $this->data['language']);
                        $width = $tmp_page->getWidth($f_name);
                        $f_datatype = $tmp_page->getDataType($f_name);
                        ?>
                {
                    text: '<?=$caption?>',
                    datafield: '<?=$f_name?>',
                    //columntype: 'textbox',
                    filtertype: 'input',
                    cellbeginedit: cellbeginedit,
                    // update the editor's value before saving it.
                    cellvaluechanging: function (row, column, columntype, oldvalue, newvalue) {
                        console.log('jqxgrid cell value changed');
                    }
                    <?=$width!=''?',width: '.$width:''?>
                    <?php if(false && $f_datatype=='Image'): ?>
                    , cellsrenderer: function (row, datafield, value) {
                    return '<img style="margin-left: 5px;" height="60" src="' + value + '"/>';
                },
                    rowsheight: 60
                    <?php endif; ?>
                },
                <?php
            }
        ?>
            ];
        </script>
    <?php
    }

    protected
    function externalGateway()
    {
        ?>
        <script>
            MYAPP.getGrid = function () {
                return jQuery('#jqxgrid');
            };
            MYAPP.isMultiSelection = function () {
                return MYAPP.getGrid().jqxGrid('selectionmode') === 'multiplerowsextended';
            };
            MYAPP.TmpVar = {};
            MYAPP.updateGrid = function (keepIndex) {
                //update databound
                (function ($) {
                    //Reset tmp var
                    MYAPP.TmpVar.id = undefined;
                    MYAPP.TmpVar.keepIndex = keepIndex;
                    //1. get selected row
                    var grid = MYAPP.getGrid();
                    var rowindex = grid.jqxGrid('getselectedrowindex');
                    if (rowindex >= 0) {
                        var row = grid.jqxGrid('getrowdata', rowindex);
                        if (row != undefined && row != null) {
                            MYAPP.TmpVar.id = row.id;
                        }
                    }
                    //2. reload grid
                    grid.jqxGrid('updatebounddata');
                })(jQuery);
            };
            MYAPP.getSelectedRowsId = function () {
                //update databound
                return (function ($) {
                    var re = [];
                    var grid = MYAPP.getGrid();
                    var rowindex = grid.jqxGrid('getselectedrowindexes');
                    for (var i = 0; i < rowindex.length; i++) {
                        var row = grid.jqxGrid('getrowdata', rowindex[i]);
                        if (row != undefined && row != null) {
                            re.push(row.id);
                        }
                    }
                    return re;
                })(jQuery);
            };
            MYAPP.addGridFilter = function (field_name, field_value, operator) {
                (function ($) {
                    // create a filter group for the FirstName column.
                    var fnameFilterGroup = new $.jqx.filter();
                    // operator between the filters in the filter group. 1 is for OR. 0 is for AND.
                    var filter_or_operator = 1;
                    // create a string filter with 'contains' condition.
                    var filtervalue = field_value;
                    var filtercondition = 'contains';
                    var fnameFilter1 = fnameFilterGroup.createfilter('stringfilter', filtervalue, filtercondition);
                    // add the filters to the filter group.
                    if(operator!=undefined){
                        fnameFilterGroup.addfilter(filter_or_operator, fnameFilter1, operator);
                    }else{
                        fnameFilterGroup.addfilter(filter_or_operator, fnameFilter1);
                    }

                    // add the filter group to the 'firstname' column in the Grid.
                    $("#jqxgrid").jqxGrid('addfilter', field_name, fnameFilterGroup);
                    // apply the filters.
                    $("#jqxgrid").jqxGrid('applyfilters');
                })(jQuery);
            };
        </script>
    <?php
    }

    protected
    function internalGateway()
    {
        ?>
        <?= $this->qrCodeScript() ?>
        <script>
            function gridGetSelectedRow() {//not work
                (function ($) {
                    var getselectedrowindexes = $('#jqxgrid').jqxGrid('getselectedrowindexes');
                    if (getselectedrowindexes.length > 0) {
                        // returns the selected row's data.
                        var row = $('#jqxgrid').jqxGrid('getrowdata', getselectedrowindexes[0]);
                        return row;
                    }
                    return null;
                })(jQuery);
            }
        </script>
        <!-- Modal -->
        <div class="modal fade" id="qdMsgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <div class="modal-title" id="qdMsgModalTitle">QR Code scanner</div>
                    </div>
                    <div id="qdMsgModalContent" class="modal-body" style="text-align: center">
                        <canvas id="qdscanport"></canvas>
                    </div>
                    <!--
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div> -->
                </div>
            </div>
        </div>
    <?php
    }

    protected
    function lookupToolbar()
    {
        ?>
        <!-- Lookup toolbar -->
        <div style="margin-bottom: 5px">
            <span>
                <button class="btn btn-primary btn-xs" id="qdchoose" type="button" style="width: 100px">
                    <?= Qdmvc_Message::getMsg('btn_choose') ?>
                </button>
            </span>

            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdgotopagenavigate" style="<?=$this->data['role'] != 'lookup'?'display: none':''?>" type="button" >
                    <?= Qdmvc_Message::getMsg('btn_gotopagenavigate') ?>
                </button>
            </span>

            <script type="text/javascript">
                (function ($) {
                    $(document).ready(function () {

                        $('#qdchoose').click(function () {

                            //$('#jqxgrid').jqxGrid('addrow', null, {});

                            var getselectedrowindexes = $('#jqxgrid').jqxGrid('getselectedrowindexes');
                            if (getselectedrowindexes.length > 0) {
                                // returns the selected row's data.

                                var row = $('#jqxgrid').jqxGrid('getrowdata', getselectedrowindexes[0]);
                                try {
                                    parent.MYAPP.setLookupResult(row.<?=$this->data['getfield']?>, "<?=$this->data['returnid']?>");

                                } catch (error) {
                                    console.log(error);
                                }
                            }
                        });
                        $("#qdgotopagenavigate").click(function () {
                            var ids = MYAPP.getSelectedRowsId();
                            if(ids.length===1){
                                MYAPP.gotoURL(MYAPP.appendParam(MYAPP.page_navigate, 'qdlookupid', ids[0]));
                            }else if(ids.length===0){
                                MYAPP.gotoURL(MYAPP.page_navigate);
                            }
                        });

                    });
                })(jQuery);
            </script>
        </div>

    <?php
    }

    protected
    function generalToolbar()
    {
        ?>
        <!-- General toolbar -->
        <div style="margin-bottom: 5px">
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdshowall" type="button">
                    <?= Qdmvc_Message::getMsg('btn_showall') ?>
                </button>
            </span>
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdclearfilter" type="button">
                    <?= Qdmvc_Message::getMsg('btn_clearfilter') ?>
                </button>
            </span>
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdreload" type="button">
                    <?= Qdmvc_Message::getMsg('btn_reloadcard') ?>
                </button>
            </span>
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdprint" type="button">
                    <?= Qdmvc_Message::getMsg('btn_print') ?>
                </button>
            </span>
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdexport" type="button">
                    <?= Qdmvc_Message::getMsg('btn_exportexcel') ?>
                </button>
            </span>
            <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdscancode" type="button">
                    <?= Qdmvc_Message::getMsg('btn_scancode') ?>
                </button>
            </span>
        <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdselectionmode"
                        style="<?= $this->data['role'] == 'lookup' ? 'display: none' : '' ?>" type="button">
                    <?= Qdmvc_Message::getMsg('btn_multiselection') ?>
                </button>
            </span>


        <span>
                <button class="btn btn-primary btn-xs qd-action-btn" id="qdselectallrows" type="button"
                        style="display: none">
                    <?= Qdmvc_Message::getMsg('btn_selectallrows') ?>
                </button>
            </span>
            <script type="text/javascript">
                (function ($) {
                    $(document).ready(function () {
                        $("#qdprint").click(function () {
                            var gridContent = $("#jqxgrid").jqxGrid('exportdata', 'html');
                            MYAPP.printDocPreview(gridContent, 800, 500);
                        });
                        $("#qdreload").click(function () {
                            MYAPP.updateGrid(true);
                        });
                        $("#qdshowall").click(function () {
                            $("#jqxgrid").jqxGrid({pagesize: 999999});
                        });
                        $("#qdexport").click(function () {
                            $("#jqxgrid").jqxGrid('exportdata', 'xls', 'jqxGrid');
                        });
                        $("#qdclearfilter").click(function () {
                            $('#jqxgrid').jqxGrid('clearfilters');
                        });
                        $("#qdselectallrows").click(function () {
                            if (MYAPP.isMultiSelection()) {
                                $('#jqxgrid').jqxGrid('selectallrows');
                            }
                        });

                        $("#qdselectionmode").click(function () {
                            var grid = $('#jqxgrid');
                            var mode = grid.jqxGrid('selectionmode');
                            /*jqxGrid bug: could not switch back to other mode whenever stay in checkbox mode*/
                            /*Bug report: http://www.jqwidgets.com/community/topic/could-not-switch-to-other-selectionmode-once-stay-in-checkbox-mode/*/
                            /*Checkbox selectionmode has lot of Bug, checkAll apply to all Pages but UnCheckAll apply for current Page only*/
                            if (mode === 'singlerow') {
                                $('#qdselectallrows').show();
                                alert('<?= Qdmvc_Message::getMsg('btn_multiselection_guide') ?>');
                                grid.jqxGrid('selectionmode', 'multiplerowsextended');
                                $(this).text('<?= Qdmvc_Message::getMsg('btn_singleselection') ?>');
                            } else {
                                $('#qdselectallrows').hide();
                                //reload page
                                //location.reload();//checkbox mode must use this solution
                                grid.jqxGrid('clearselection');
                                grid.jqxGrid('selectionmode', 'singlerow');
                                $(this).text('<?= Qdmvc_Message::getMsg('btn_multiselection') ?>');
                            }

                        });

                        var scanner_decoder = null;
                        $("#qdscancode").click(function () {
                            //$('#jqxgrid').jqxGrid('clearfilters');
                            $("#qdMsgModal").modal('show');
                            $('#qdMsgModal').on('hidden.bs.modal', function () {
                                //alert('Stop');
                                setTimeout(function () {
                                    scanner_decoder.stop();//fail when stop immediately, need use time out
                                }, 1000);
                            });

                            (function ($) {
                                var arg = {
                                    zoom: 1,
                                    frameRate: 15,
                                    width: 360,
                                    height: 240,
                                    DecodeBarCodeRate: null,
                                    beep: '<?=QdJqwidgets::getResourcePath('plugin/qr/beep.mp3')?>',
                                    //flipHorizontal: true,//not supported
                                    resultFunction: function (resText, lastImageSrc) {
                                        //$('#jqxgrid').jqxGrid('clearfilters');
                                        MYAPP.addGridFilter('id', resText);
                                        //$("#qdMsgModal").modal('hide');
                                    }
                                };

                                scanner_decoder = $("#qdscanport").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
                                scanner_decoder.play();
                            })(jQuery);
                        });
                    });
                })(jQuery);
            </script>
        </div>

    <?php
    }

    public
    function render()
    {
        if ($this->data['nopermission'] === true) {
            $this->layout_nopermission();
            return;
        }
        $this->style();
        parent::render();
        ?>
        <div id="qdmvcRootDiv" style="display: none; width: inherit; height: inherit">
            <?= $this->onReadyHook() ?>
            <?= $this->preConfig() ?>
            <?= $this->externalGateway() ?>
            <?= $this->internalGateway() ?>
            <?= $this->generateFields() ?>

            <script type="text/javascript">
                (function ($) {
                    $(document).ready(function () {
                        var theme = 'classic';
                        var source =
                        {
                            datatype: "json",
                            datafields: dataSourceDefine,
                            url: MYAPP.data_port,
                            root: 'rows',
                            beforeprocessing: function (data) {
                                source.totalrecords = data.total;
                            },
                            //Server side sorting May 19, 2015
                            sort: function () {
                                // update the grid and send a request to the server.
                                console.log('Send SORT to Server');
                                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                            },
                            type: 'POST'//switch from GET to POST
                        };

                        var dataadapter = new $.jqx.dataAdapter(source);

                        // initialize jqxGrid
                        $("#jqxgrid").jqxGrid(
                            {
                                width: '100%',
                                height: '100%',
                                source: dataadapter,
                                theme: theme,
                                autoheight: false,
                                pageable: true,
                                showfilterrow: true,
                                filterable: true,
                                showgroupsheader: true,
                                groupable: true,
                                virtualmode: true,
                                pagesize: 20,
                                sortable: true, /*May 19 2015*/
                                pagesizeoptions: ['5', '10', '20', '50', '100', '200', '999999'],
                                /*Enable Inline Editing*/
                                /*editable: true,
                                 editmode: "dblclick",*/
                                columnsresize: true,
                                selectionmode: 'singlerow', /*checkbox*/
                                //scrollmode: 'deferred',
                                rendergridrows: function () {
                                    return dataadapter.records;
                                },
                                columns: dataGridDefine,
                                /*
                                 columns: [
                                 { text: 'Ship Name', datafield: 'parent_id', columntype: 'combobox' }
                                 ]*/
                                ready: function () {

                                }
                            });

                        //event
                        $("#jqxgrid").on("filter", function (event) {
                            $('#jqxgrid').jqxGrid('updatebounddata');//refresh grid when typing in filter box
                        });
                        $('#jqxgrid').on('rowselect', function (event) {
                            // event arguments.
                            var args = event.args;
                            var row = args.row;
                            // row's bound index.
                            //var rowBoundIndex = args.rowindex;
                            // row's data. The row's data object or null(when all rows are being selected or unselected with a single action). If you have a datafield called "firstName", to access the row's firstName, use var firstName = rowData.firstName;
                            //formObj = args.row;

                            //call pass obj to CARD
                            try {
                                <?php
                                if($this->data['role']=='navigate')
                                {
                                    echo 'parent.MYAPP.clearFormValidationMark();';
                                    echo 'parent.MYAPP.setObj(args.row, true);';
                                }
                                ?>
                            } catch (error) {
                                console.log(error);
                            }
                        });

                        $('#jqxgrid').on('rowdoubleclick', function (event) {
                            <?php if($this->data['role']==='navigate') { ?>
                            rbindex = event.args.rowindex;
                            obj = $(this).jqxGrid('getrowdata', rbindex);
                            parent.MYAPP.doubleClickObj(obj);
                            <?php } else if($this->data['role']==='lookup') { ?>
                            $('#qdchoose').trigger('click');
                            <?php } ?>
                        });


                        $("#jqxgrid").on("pagechanged", function (event) {
                            console.log('jqxgrid page changed');
                        });
                        $("#jqxgrid").on("bindingcomplete", function (event) {
                            console.log('jqxgrid binding complete');
                            try {
                                var paging = $(this).jqxGrid('getpaginginformation');
                                var offset = paging.pagenum * paging.pagesize;
                                //reselect row if exist
                                if (MYAPP.TmpVar.keepIndex !== false && MYAPP.TmpVar.id != undefined && MYAPP.TmpVar.id != null) {
                                    var index = 0;
                                    var rows = $(this).jqxGrid('getrows');

                                    for (var i = 0; i < rows.length; i++) {
                                        if (rows[i].id == MYAPP.TmpVar.id) {
                                            $(this).jqxGrid('selectrow', offset + i);
                                            break;
                                        }
                                        if (i == rows.length - 1) {
                                            $(this).jqxGrid('selectrow', offset);
                                        }
                                    }
                                }
                                else {
                                    //var rowindex = $(this).jqxGrid('getselectedrowindex');
                                    $(this).jqxGrid('selectrow', offset);
                                }
                                //reset keep Index
                                MYAPP.TmpVar.keepIndex = true;

                                //Set lookupid filter for 1st time
                                if(parent!=undefined && parent!=null) {
                                    if (parent.MYAPP.LookupMode.isSetLookupFilterForFirstTime == false && parent.MYAPP.LookupMode.lookupid != '') {
                                        setTimeout(function(){
                                            MYAPP.addGridFilter('id', '=' + parent.MYAPP.LookupMode.lookupid);
                                            parent.MYAPP.LookupMode.isSetLookupFilterForFirstTime = true;
                                        }, 500);
                                    }
                                }
                            } catch (error) {
                                console.log(error);
                            }
                        });
                    });
                })(jQuery);
            </script>

            <?php
            if ($this->data['role'] == 'lookup') {
                $this->lookupToolbar();
            }
            ?>
            <?= $this->generalToolbar() ?>
            <div id='jqxWidget'>
                <div id="jqxgrid"></div>
            </div>
        </div>
    <?php
    }

    protected
    function onReadyHook()
    {
        parent::onReadyHook(); // TODO: Change the autogenerated stub
        ?>
    <?php
    }

    private
    function qrCodeScript()
    {
        ?>
        <script>
            /*!
             * WebCodeCamJQuery 1.7.0 jQuery plugin Bar code and QR code decoder
             * Author: Tóth András
             * Web: http://atandrastoth.co.uk
             * email: atandrastoth@gmail.com
             * Licensed under the MIT license
             */
            (function ($, window, document, undefined) {
                'use strict';
                var pluginName = 'WebCodeCamJQuery';
                var mediaDevices = navigator.mediaDevices || ((navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia) ? {
                        getUserMedia: function (c) {
                            return new Promise(function (y, n) {
                                (navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia).call(navigator, c, y, n);
                            });
                        },
                        enumerateDevices: function (c) {
                            return new Promise(function (c, y, n) {
                                (MediaStreamTrack.getSources).call(navigator, c, y, n);
                            });
                        }
                    } : null);
                HTMLVideoElement.prototype.streamSrc = ('srcObject' in HTMLVideoElement.prototype) ? function (stream) {
                    this.srcObject = !!stream ? stream : null;
                } : function (stream) {
                    this.src = !!stream ? (window.URL || window.webkitURL).createObjectURL(stream) : new String();
                };
                var Self, display, videoSelect, lastImageSrc, con, beepSound, w, h,
                    DecodeWorker = new Worker('<?=QdJqwidgets::getResourcePath('plugin/qr/DecoderWorker.js')?>'),
                    video = $('<video muted autoplay></video>')[0],
                    flipped = false,
                    isStreaming = false,
                    delayBool = false,
                    initialized = false,
                    localStream = null,
                    defaults = {
                        decodeQRCodeRate: 5,
                        decodeBarCodeRate: 5,
                        frameRate: 15,
                        width: 320,
                        height: 240,
                        constraints: {
                            video: {
                                mandatory: {
                                    maxWidth: 1280,
                                    maxHeight: 720
                                },
                                optional: [{
                                    sourceId: true
                                }]
                            },
                            audio: false
                        },
                        flipVertical: false,
                        flipHorizontal: false,
                        zoom: -1,
                        beep: 'audio/beep.mp3',
                        brightness: 0,
                        autoBrightnessValue: false,
                        grayScale: false,
                        contrast: 0,
                        threshold: 0,
                        sharpness: [],
                        resultFunction: function (resText, lastImageSrc) {
                            console.log(resText);
                        },
                        cameraSuccess: function (stream) {
                            console.log('cameraSuccess');
                        },
                        canPlayFunction: function () {
                            console.log('canPlayFunction');
                        },
                        getDevicesError: function (error) {
                            console.log(error);
                        },
                        getUserMediaError: function (error) {
                            console.log(error);
                        },
                        cameraError: function (error) {
                            console.log(error);
                        }
                    };

                function Plugin(element, options) {
                    Self = this;
                    this.element = element;
                    display = element;
                    this.options = $.extend({}, defaults, options);
                    this._defaults = defaults;
                    this._name = pluginName;
                    return this;
                }

                function init() {
                    con = display.getContext('2d');
                    w = Self.options.width;
                    h = Self.options.height;
                    var constraints = changeConstraints();
                    try {
                        mediaDevices.getUserMedia(constraints).then(cameraSuccess).catch(function (error) {
                            Self.options.cameraError(error);
                            return false;
                        });
                    } catch (error) {
                        Self.options.getUserMediaError(error);
                        return false;
                    }
                    return true;
                }

                function play() {
                    if (!localStream) {
                        init();
                    }
                    delayBool = true;
                    video.play();
                    setTimeout(function () {
                        delayBool = false;
                        if (Self.options.decodeBarCodeRate) {
                            tryParseBarCode();
                        }
                        if (Self.options.decodeQRCodeRate) {
                            tryParseQRCode();
                        }
                    }, 2E3);
                }

                function stop() {
                    con.clearRect(0, 0, w, h);
                    delayBool = true;
                    video.pause();
                    video.streamSrc(null);
                    try {
                        localStream.stop();
                    } catch (e) {
                        localStream.active = false;
                        localStream.enabled = false;
                    }
                    localStream = null;
                }

                function pause() {
                    delayBool = true;
                    video.pause();
                }

                function cameraSuccess(stream) {
                    localStream = stream;
                    video.streamSrc(stream);
                    video.play();
                    Self.options.cameraSuccess(stream);
                }

                function cameraError(error) {
                    Self.options.cameraError(error);
                }

                function setEventListeners() {
                    $(video).on('canplay', function (e) {
                        if (!isStreaming) {
                            if (video.videoWidth > 0) {
                                h = video.videoHeight / (video.videoWidth / w);
                            }
                            $(display).attr('width', w);
                            $(display).attr('height', h);
                            if (Self.options.flipHorizontal) {
                                con.scale(-1, 1);
                                con.translate(-w, 0);
                            }
                            if (Self.options.flipVertical) {
                                con.scale(1, -1);
                                con.translate(0, -h);
                            }
                            isStreaming = true;
                            if (Self.options.decodeQRCodeRate || Self.options.decodeBarCodeRate) {
                                delay();
                            }
                        }
                    });
                    $(video).on('play', function () {
                        setInterval(function () {
                            if (video.paused || video.ended) {
                                return;
                            }
                            var z = Self.options.zoom;
                            if (z < 0) {
                                z = optimalZoom();
                            }
                            con.drawImage(video, (w * z - w) / -2, (h * z - h) / -2, w * z, h * z);
                            var imageData = con.getImageData(0, 0, w, h);
                            if (Self.options.grayScale) {
                                imageData = grayScale(imageData);
                            }
                            if (Self.options.brightness !== 0 || Self.options.autoBrightnessValue) {
                                imageData = brightness(imageData, Self.options.brightness);
                            }
                            if (Self.options.contrast !== 0) {
                                imageData = contrast(imageData, Self.options.contrast);
                            }
                            if (Self.options.threshold !== 0) {
                                imageData = threshold(imageData, Self.options.threshold);
                            }
                            if (Self.options.sharpness.length !== 0) {
                                imageData = convolute(imageData, Self.options.sharpness);
                            }
                            con.putImageData(imageData, 0, 0);
                        }, 1E3 / Self.options.frameRate);
                    });
                }

                function setCallBack() {
                    DecodeWorker.onmessage = function (e) {
                        if (delayBool || video.paused) {
                            return;
                        }
                        if (e.data.success && e.data.result[0].length > 1 && e.data.result[0].indexOf('undefined') == -1) {
                            beepSound.play();
                            delayBool = true;
                            delay();
                            setTimeout(function () {
                                Self.options.resultFunction(e.data.result[0], lastImageSrc);
                            }, 0);
                        } else {
                            if (e.data.finished && Self.options.decodeBarCodeRate) {
                                flipped = !flipped;
                                setTimeout(tryParseBarCode, 1E3 / Self.options.decodeBarCodeRate);
                            }
                        }
                    };
                    qrcode.callback = function (a) {
                        if (delayBool || video.paused) {
                            return;
                        }
                        beepSound.play();
                        delayBool = true;
                        delay();
                        setTimeout(function () {
                            Self.options.resultFunction(a, lastImageSrc);
                        }, 0);
                    };
                }

                function tryParseBarCode() {
                    var flipMode = flipped === true ? 'flip' : 'normal';
                    lastImageSrc = display.toDataURL();
                    DecodeWorker.postMessage({
                        ImageData: con.getImageData(0, 0, w, h).data,
                        Width: w,
                        Height: h,
                        cmd: flipMode,
                        DecodeNr: 1,
                        LowLight: false
                    });
                }

                function tryParseQRCode() {
                    try {
                        lastImageSrc = display.toDataURL();
                        qrcode.decode();
                    } catch (e) {
                        if (!delayBool) {
                            setTimeout(tryParseQRCode, 1E3 / Self.options.decodeQRCodeRate);
                        }
                    }
                }

                function delay() {
                    setTimeout(play, 500, true);
                }

                function optimalZoom() {
                    return video.videoHeight / h;
                }

                function getImageLightness() {
                    var pixels = con.getImageData(0, 0, w, h),
                        d = pixels.data,
                        colorSum = 0,
                        r, g, b, avg;
                    for (var x = 0, len = d.length; x < len; x += 4) {
                        r = d[x];
                        g = d[x + 1];
                        b = d[x + 2];
                        avg = Math.floor((r + g + b) / 3);
                        colorSum += avg;
                    }
                    return Math.floor(colorSum / (w * h));
                }

                function brightness(pixels, adjustment) {
                    adjustment = adjustment === 0 && Self.options.autoBrightnessValue ? Self.options.autoBrightnessValue - getImageLightness() : adjustment;
                    var d = pixels.data;
                    for (var i = 0; i < d.length; i += 4) {
                        d[i] += adjustment;
                        d[i + 1] += adjustment;
                        d[i + 2] += adjustment;
                    }
                    return pixels;
                }

                function grayScale(pixels) {
                    var d = pixels.data;
                    for (var i = 0; i < d.length; i += 4) {
                        var r = d[i],
                            g = d[i + 1],
                            b = d[i + 2],
                            v = 0.2126 * r + 0.7152 * g + 0.0722 * b;
                        d[i] = d[i + 1] = d[i + 2] = v;
                    }
                    return pixels;
                }

                function contrast(pixels, cont) {
                    var d = pixels.data,
                        average;
                    for (var i = 0; i < d.length; i += 4) {
                        cont = 10,
                            average = Math.round((d[i] + d[i + 1] + d[i + 2]) / 3);
                        if (average > 127) {
                            d[i] += d[i] / average * cont;
                            d[i + 1] += d[i + 1] / average * cont;
                            d[i + 2] += d[i + 2] / average * cont;
                        } else {
                            d[i] -= d[i] / average * cont;
                            d[i + 1] -= d[i + 1] / average * cont;
                            d[i + 2] -= d[i + 2] / average * cont;
                        }
                    }
                    return pixels;
                }

                function threshold(pixels, thres) {
                    var average, d = pixels.data;
                    for (var i = 0, len = w * h * 4; i < len; i += 4) {
                        average = d[i] + d[i + 1] + d[i + 2];
                        if (average < thres) {
                            d[i] = d[i + 1] = d[i + 2] = 0;
                        } else {
                            d[i] = d[i + 1] = d[i + 2] = 255;
                        }
                        d[i + 3] = 255;
                    }
                    return pixels;
                }

                function convolute(pixels, weights, opaque) {
                    var sw = pixels.width,
                        sh = pixels.height,
                        w = sw,
                        h = sh,
                        side = Math.round(Math.sqrt(weights.length)),
                        halfSide = Math.floor(side / 2),
                        src = pixels.data,
                        tmpCanvas = document.createElement('canvas'),
                        tmpCtx = tmpCanvas.getContext('2d'),
                        output = tmpCtx.createImageData(w, h),
                        dst = output.data,
                        alphaFac = opaque ? 1 : 0;
                    for (var y = 0; y < h; y++) {
                        for (var x = 0; x < w; x++) {
                            var sy = y,
                                sx = x,
                                r = 0,
                                g = 0,
                                b = 0,
                                a = 0,
                                dstOff = (y * w + x) * 4;
                            for (var cy = 0; cy < side; cy++) {
                                for (var cx = 0; cx < side; cx++) {
                                    var scy = sy + cy - halfSide,
                                        scx = sx + cx - halfSide;
                                    if (scy >= 0 && scy < sh && scx >= 0 && scx < sw) {
                                        var srcOff = (scy * sw + scx) * 4,
                                            wt = weights[cy * side + cx];
                                        r += src[srcOff] * wt;
                                        g += src[srcOff + 1] * wt;
                                        b += src[srcOff + 2] * wt;
                                        a += src[srcOff + 3] * wt;
                                    }
                                }
                            }
                            dst[dstOff] = r;
                            dst[dstOff + 1] = g;
                            dst[dstOff + 2] = b;
                            dst[dstOff + 3] = a + alphaFac * (255 - a);
                        }
                    }
                    return output;
                }

                function buildSelectMenu(selectorVideo) {
                    videoSelect = $(selectorVideo);
                    videoSelect.html('');
                    try {
                        if (mediaDevices && mediaDevices.enumerateDevices) {
                            mediaDevices.enumerateDevices().then(function (devices) {
                                devices.forEach(function (device) {
                                    gotSources(device);
                                });
                                videoSelect.children('option:first').prop('selected', true);
                            }).catch(function (error) {
                                Self.options.getDevicesError(error);
                            });
                        } else if (mediaDevices && !mediaDevices.enumerateDevices) {
                            $('<option value="true">On</option>').appendTo(videoSelect);
                            Self.options.getDevicesError(new NotSupportError('enumerateDevices Or getSources is Not supported'));
                        } else {
                            throw new NotSupportError('getUserMedia is Not supported');
                        }
                    } catch (error) {
                        Self.options.getDevicesError(error);
                    }
                }

                function gotSources(device) {
                    if (device.kind === 'video' || device.kind === 'videoinput') {
                        var face = (!device.facing || device.facing === '') ? 'unknown' : device.facing;
                        var text = device.label || 'Camera '.concat(videoSelect.children().length + 1, ' (facing: ' + face + ')');
                        $('<option value="' + (device.id || device.deviceId) + '">' + text + '</option>').appendTo(videoSelect);
                    }
                }

                function changeConstraints() {
                    var constraints = $.parseJSON(JSON.stringify(Self.options.constraints));
                    if (videoSelect && videoSelect.children().length !== 0) {
                        switch (videoSelect.val().toString()) {
                            case 'true':
                                constraints.video.optional = [{
                                    sourceId: true
                                }];
                                break;
                            case 'false':
                                constraints.video = false;
                                break;
                            default:
                                constraints.video.optional = [{
                                    sourceId: videoSelect.val()
                                }];
                                break;
                        }
                    }
                    constraints.audio = false;
                    return constraints;
                }

                function NotSupportError(message) {
                    this.name = 'NotSupportError';
                    this.message = (message || '');
                }

                NotSupportError.prototype = Error.prototype;
                $.extend(Plugin.prototype, {
                    init: function () {
                        if (!initialized) {
                            if (!display || display.tagName.toLowerCase() !== 'canvas') {
                                console.log('Element type must be canvas!');
                                alert('Element type must be canvas!');
                                return false;
                            }
                            qrcode.sourceCanvas = display;
                            initialized = true;
                            setEventListeners();
                            if (this.options.decodeQRCodeRate || this.options.decodeBarCodeRate) {
                                setCallBack();
                            }
                            beepSound = new Audio(this.options.beep);
                        }
                        return this;
                    },
                    play: function () {
                        this.init();
                        play();
                        return this;
                    },
                    stop: function () {
                        stop();
                        return this;
                    },
                    pause: function () {
                        pause();
                        return this;
                    },
                    buildSelectMenu: function (selector) {
                        buildSelectMenu(selector);
                        return this;
                    },
                    getOptimalZoom: function () {
                        return optimalZoom();
                    },
                    getLastImageSrc: function () {
                        return display.toDataURL();
                    },
                    isInitialized: function () {
                        return initialized;
                    }
                });
                $.fn[pluginName] = function (options) {
                    return this.each(function () {
                        if (!$.data(this, 'plugin_' + pluginName)) {
                            $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
                        }
                    });
                }
            })(jQuery, window, document);
        </script>
    <?php
    }
}