<div id="billview" style="width:560px; margin:0 0 0 20px">

<style>
table,th,td,tr{
	padding:0 !important;
	border-collapse:collapse;
	border:0px grey solid;

}
#page{
	width:400px !important;
}
</style>
<div style="height:130px;"></div>
<table width="100%">
<tr>
<th style="width:150px">{php} echo date("d M Y");{/php}</th>
<th style="width:130px">{$order["check_no"]}</th>
<th style="width:100px">{$order["tableno"]|str_pad:2:"0":$smarty.const.STR_PAD_LEFT}</th>
<th >{$order["cover"]|str_pad:2:"0":$smarty.const.STR_PAD_LEFT}</th>
</tr>
<tr>
<th><div style="font-size:11px; padding-top:10px;">{php} echo date("h:i:sA");{/php}</div></th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
</table>
<br  />
<div style="height:42px;"></div>
<table style="border:1px" width="100%">


{php}
{$sr=1}
{$foodtotal=0}
{$Bevrtotal=0}
{$total=0}
{$total_rows = 0}

{/php}
{foreach $order_detail as $k=>$row}

{if $item_type[$row['item_id']]==1}
{$Bevrtotal=$Bevrtotal+$row['total']}
{elseif $item_type[$row['item_id']]==0}
{$foodtotal=$foodtotal+$row['total']}
{/if}
{$gst=$row['gst']}
{$gst_rate=$row['gst_rate']}
{$discount=$row['discount']}
{$discountrate=$row['discountrate']}

<tr>
<td style="width:30px; text-align:left;">{$row["quantity"]}</td>
<td style="width:350px; text-align:left;" >{$item_name[$row["item_id"]]}</td>
<td style="width:100px; text-align:left;">{$row["rate"]|string_format:"%.2f"}</td>
<td style="text-align:right;">{$row['total']|string_format:"%.2f"}</td>
</tr>
{$sr=$sr+1}
{/foreach}

{for $rows=1 to 10-$sr}
<tr>
<td style="width:12px; text-align:center;">&nbsp;</td>
<td >&nbsp;</td>

<td style="width:15px; text-align:center;">&nbsp;</td>
<td style="width:auto;">&nbsp;</td>
</tr>
{/for}
{$discountval=(($foodtotal)*($discountrate)/100)}
{$foodtotaldisc=$foodtotal}
{if ($discountrate>0 || $discount>0)}
	{if ($discountrate==0 && $discount>0)}
	{$discount_type="Discount:"}
	{$discom=$discount}
	{elseif ($discountrate>0 && $discount==0)}
	{$discount_type="Discount{$discountrate}:"}
	{$discom=$discountval}
	{/if}
{else}
{$foodtotaldisc=$foodtotal}
{/if}

{$total=$foodtotaldisc+$Bevrtotal}

<tr><td colspan="2"><strong style="padding-left:240px">Food Total:</strong></td>
<td colspan="2" style="text-align:right;">{$foodtotal|string_format:"%.2f"}</td></tr>
<tr><td colspan="2"><strong style="padding-left:240px">Bevr. Total:</strong></td>
<td colspan="2" style="text-align:right;">{$Bevrtotal|string_format:"%.2f"}</td></tr>

{if $gst_rate>0}
{$gst=(($total)*($gst_rate)/100)}
{$total=$total+$gst}
<tr><td colspan="2"><strong  style="padding-left:240px">{$gst_rate|string_format:"%.2f"}%  G.S.T :</strong></td>
<td colspan="2" style="text-align:right;">{$gst|string_format:"%.2f"}</td></tr>
{/if}

{if $discom>0}
{$gst=(($total)*($gst_rate)/100)}
{$total=$total+$gst}
<tr><td colspan="2"><strong style="padding-left:240px">Total:</strong></td>
<td colspan="2" style="text-align:right;">{$total|string_format:"%.2f"}</td></tr>
{/if}

{if $discountrate>0 || $discount>0}
{$gst=(($total)*($gst_rate)/100)}
{$total=$total+$gst}
<tr><td colspan="2"><strong style="padding-left:240px">{$discount_type}</strong></td>
<td colspan="2" style="text-align:right;">{$discom|string_format:"%.2f"}</td></tr>
{/if}

{if $discountrate>0 || $discount>0}
{$gst=(($total)*($gst_rate)/100)}
{$total=$total+$gst}
<tr><td colspan="2"><strong style="padding-left:240px">{$discount_type}</strong></td>
<td colspan="2" style="text-align:right;">{$discom|string_format:"%.2f"}</td></tr>
{$grandtotal=$total-$discom}
{else}
{$grandtotal=$total}
{/if}
<tr><td colspan="2"><strong style="padding-left:240px">Grand Total:</strong></td>
<td colspan="2" style="text-align:right;">{$grandtotal|string_format:"%.2f"}</td></tr>
</table>
</div>

<div style="margin:0 0 0 20px; width:400px; text-align:left; font-size:18px; font-weight:bold; font-family:Tahoma, Geneva, sans-serif">
{$order["footer"]}
</div>
