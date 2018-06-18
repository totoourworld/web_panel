<div style="background-color:#fff; border:0px solid #bbbbbb; padding:15px;">
    <div class="print" id="print">

        <table width="100%" border="0">
            <tbody><tr>
                    <td>
                        <h5>Kunafa Administrator <br>140 New Montgomery St<br>San Francisco, CA 94105</h5>
                    </td>
                    <td>&nbsp;</td>
                    <td valign="top" align="right"><h5>Statement <?php echo date('d/m/Y', strtotime($from));?> - <?php echo date('d/m/Y', strtotime($to));?></h5></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table style="border-collapse:collapse" width="100%" cellspacing="0" border="0">
                            <tbody><tr>
                                    <td class="border" width="221">To: <?php echo $restaurant[0]['Restaurant']['name'];?></td>
                                    <td width="136">&nbsp;</td>
                                    <td class="border" align="center">Date</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" width="400" class="border"><?php echo $restaurant[0]['Restaurant']['address'];?></td>
                                    <td class="border0" align="center">&nbsp;</td>
                                    <td class="border" width="270" align="center"><?php echo date('d/m/Y H:i:s');?></td>
                                </tr>

                            </tbody></table>
                        <br>
                    </td>
                </tr>
            </tbody></table>
        <h2>Summary</h2>
        <?php
        if ( ! empty($statements))
        {
            ?>
            <table cellspacing="0" cellpadding="5" border="1" align="left">
                <tbody><tr>
                        <td class="border" align="center">Count</td>
                        <td class="border" align="center">Total Fare</td>
                        <td class="border" align="center">Total Cash</td>
                        <td class="border" align="center">Total CC</td>
                        <td class="border" align="center">Total Tax</td>
                        <td class="border" align="center">Total Tip</td>
                    </tr>
                    <tr>
                        <td class="border" align="center"><?php echo $statements['TotalSummary']['Count'];?></td>
                        <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalFare'], 2);?></td>
                        <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalCash'], 2);?></td>
                        <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalCC'], 2);?></td>
                        <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalTax'], 2);?></td>
                        <td class="border" align="center">$<?php echo number_format($statements['TotalSummary']['TotalTip'], 2);?></td>
                    </tr>
                </tbody></table>
            <br>
            <?php
            if ( ! empty($driverStatements))
            {
                $currentPage=1;
                foreach ($driverStatements as $key => $value)
                {
                    if (isset($value['Count']) && $value['Count'])
                    {
                        ?>
                        <div class="page " style="margin-top: 20px; margin-bottom: 10px;" align="right">Page: <?php echo $currentPage ++;?> of <?php echo sizeof($driverStatements);?></div>
                        <h2><?php echo $drivers[$key];?></h2>
                        <div style="clear: both;">
                            <table style="clear: both;" cellspacing="0" cellpadding="5" border="1" align="left">
                                <tbody><tr>
                                        <td class="border" align="center">Count</td>
                                        <td class="border" align="center">Total Fare</td>
                                        <td class="border" align="center">Total Cash</td>
                                        <td class="border" align="center">Total CC</td>
                                        <td class="border" align="center">Total Tax</td>
                                        <td class="border" align="center">Total Tip</td>
                                    </tr>
                                    <tr>
                                        <td class="border" align="center"><?php echo $value['Count'];?></td>
                                        <td class="border" align="center">$<?php echo number_format($value['TotalFare'], 2);?></td>
                                        <td class="border" align="center">$<?php echo number_format($value['TotalCash'], 2);?></td>
                                        <td class="border" align="center">$<?php echo number_format($value['TotalCC'], 2);?></td>
                                        <td class="border" align="center">$<?php echo number_format($value['TotalTax'], 2);?></td>
                                        <td class="border" align="center">$<?php echo number_format($value['TotalTip'], 2);?></td>
                                    </tr>
                                </tbody></table>
                        </div>
                        <div style="clear: both;"></div>
                        <br>
                        <table style="border-collapse:collapse" width="100%" cellspacing="0" border="1">
                            <tbody><tr>
                                    <th align="center">Trip time</th>
                                    <th align="center">Trip #</th>

                                    <th align="center">Type</th>
                                    <th align="center">Tax</th>
                                    <th align="center">Delivery Fare</th>
                                    <th align="center">Tip</th>
                                </tr>
                                <?php
                                if ( ! empty($value['Trips']))
                                {
                                    foreach ($value['Trips'] as $innerkey => $innervalue)
                                    {
                                        ?>
                                        <tr class="">
                                            <td nowrap="" align="center"><?php echo date('d/m/Y H:i:s', strtotime($innervalue['Trip']['trip_date']));?></td>
                                            <td width="100" nowrap="" align="center">#<?php echo $innervalue['Trip']['trip_id'];?></td>

                                            <td nowrap="" align="center"><?php echo strtoupper($innervalue['Trip']['trip_pay_mode']);?></td>
                                            <td align="center"><?php echo number_format($innervalue['Trip']['tax_amt'], 2);?></td>
                                            <td align="center"><?php echo number_format($innervalue['Trip']['trip_delivery_fee'], 2);?></td>
                                            <td align="center"><?php echo number_format($innervalue['Trip']['trip_tip'], 2);?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody></table>
                        <br><br>
                        <?php
                    }
                }
            }
            ?>

            <?php
        }
        else
        {
            ?>
            <h5 style="text-align: center;">Order Not Found...</h5> 
            <?php }
        ?>

    </div>
    <div style="clear:both;font-size: xx-small;" align="right">v7</div>
</div>