<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/11/15
 * Time: 9:32 AM
 */
Qdmvc::loadLayout('layout_report_viewer');
class Qdmvc_Page_DatabaseSvc_View extends Qdmvc_Layout_Report_Viewer
{
    public function render()
    {
        parent::render();
        parent::onReadyHook();
        $ds = $this->page->getDataSet();
        ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    // prepare chart data as an array
                    var sampleData = <?=json_encode($ds)?>;
                    // prepare jqxChart settings
                    var settings = {
                        title: "Số lượng SP theo Struct Level",
                        description: "",
                        enableAnimations: true,
                        showLegend: true,
                        padding: {left: 5, top: 5, right: 5, bottom: 5},
                        titlePadding: {left: 90, top: 0, right: 0, bottom: 10},
                        source: sampleData,
                        xAxis: {
                            dataField: 'Table',
                            showGridLines: true
                        },
                        colorScheme: 'scheme01',
                        seriesGroups: [
                            {
                                type: 'column',
                                columnsGapPercent: 50,
                                seriesGapPercent: 0,
                                valueAxis: {
                                    unitInterval: 5,
                                    minValue: 0,
                                    //maxValue: 100,
                                    displayValueAxis: true,
                                    description: 'Số lượng',
                                    axisSize: 'auto',
                                    tickMarksColor: '#888888'
                                },
                                series: [
                                    {dataField: 'Count', displayText: 'Số lượng'},
                                ]
                            }
                        ]
                    };

                    // setup the chart
                    $('#jqxChart').jqxChart(settings);
                });
            })(jQuery);
        </script>
        <div style='height: 600px; width: 682px;'>
            <div id='host' style="margin: 0 auto; width:850px; height:400px;">
                <div id='jqxChart' style="width:850px; height:400px; position: relative; left: 0px; top: 0px;">
                </div>
            </div>
        <?php
    }
}