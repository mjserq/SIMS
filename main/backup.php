$datenow = date('Y-m-d'); 
				   $expiry = $datenow;
                   $expired=$row['expiry_date'];
                   $total=$row['total'];
				$qtyleft=$row['qty'];

                  if ($expired == $expiry || $qtyleft > 5) {
               // echo '<tr class="alert alert-warning record" style="color: #fff; background:black;">';
                 	
                  echo '<td style="color: #fff; background:black;">Expired</td>';
                  
				
				
				
				   }