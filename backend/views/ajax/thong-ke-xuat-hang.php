<?php 
   $totalSoluongCay 	= 0;
   $totalPrice			= 0;	
foreach($thongKeHangHoa as $hhtk){
   	$totalSoluongCay += $hhtk['soluong']; 
   	$totalPrice		 += $hhtk['totalPrice'];								
?>
<tr>
   <td><?=$hhtk['code']?></td>
   <td><?=$hhtk['name']?></td>
   <td><?=number_format($hhtk['soluong'])?></td>
   <td><?=number_format($hhtk['totalPrice'])?></td>
</tr>
<?php } ?>
<tr style="font-weight:bold;">
   <td>Tổng</td>
   <td></td>
   <td><?=number_format($totalSoluongCay)?></td>
   <td ><?=number_format($totalPrice)?></td>
</tr>