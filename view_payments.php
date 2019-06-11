<?php  
 $connect = mysqli_connect("localhost", "root", "root", "TalatZubair_13038");  
 $output = '';  
 $customer_id=isset($_POST["customer_id"])?$_POST["customer_id"]:"";
 $sql = "SELECT * FROM payments_13038 WHERE customer_id='$customer_id' ";  
 $sql1 = "SELECT * FROM customers WHERE customer_id='$customer_id'";
 $sql2 = "SELECT sp_id FROM salesperson_13038";
 $result = mysqli_query($connect, $sql);  
 $result1 = mysqli_query($connect, $sql1);
 $result2 = mysqli_query($connect, $sql2);
 $row = mysqli_fetch_array($result1);
 $output .= '  
 <br></br>
<h4>Customer Details:</h4>
<table width = 100% style = "width: 100%;
        margin: 5px;
        border-collapse: collapse;">
<tr>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Customer ID</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Shop Name</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Customer Name</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Contact Number</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Address</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Area</th>
<th style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Geographical Coordinates</th>
</tr>
<tr>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["customer_id"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["shop_name"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["customer_name"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["contact_number"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["address"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["area"].'</td>
     <td style="padding: 20px; background-color: #B1E0E9; font-family: Arial;">'.$row["geo_coordinates"].'</td>
</tr>
</table>
 <br></br>
<h4>Order: </h4>
        <div class="table-responsive">  
            <table class="table table-bordered">  
                <tr>  
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Receipt ID</th>  
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Date</th> 
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Customer ID</th>  
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Salesperson ID</th>
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Amount</th> 
                     <th width="20%" style="background-color: #064D89; color: #FFFFFF; text-align: center; font-family: Trebuchet MS; border: 1px solid #FFFFFF; padding: 20px;">Edit/Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
       $result2 = mysqli_query($connect, $sql2);
           $output .= '  
           <tr style="background-color: white; padding: 20px;">  
                     <td class="receipt_id" data-id1="'.$row["receipt_id"].'" contenteditable>'.$row["receipt_id"].'</td>
                     <td class="date" data-id2="'.$row["receipt_id"].'" contenteditable>'.$row["date"].'</td>
                     <td>'.$row["customer_id"].'</td> 
                     <td>';
             $output .= '<select class="sp_id form-control" data-id4="'.$row["receipt_id"].'">';
            $output .= '<option value="">None</option>';
                while ($row1 = mysqli_fetch_array($result2)) { 
$output .= '<option value="'.$row1["sp_id"].'"'.($row["sp_id"]==$row1["sp_id"]?'selected="selected"':"").'>'.$row1["sp_id"].'</option>';
                                                }
$output .= '</select>
            </td>
                     <td class="amount" data-id5="'.$row["receipt_id"].'" contenteditable>'.$row["amount"].'</td>
<td><button type="button" name="delete_btn" data-id6="'.$row["O_No"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>
        </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="receipt_id" contenteditable></td>
                <td id="date" contenteditable></td>
                <td id="customer_id">'.$customer_id.'</td>    
                <td>';
        $output .= '<select id="sp_id" class="form-control">';
        $output .= '<option value="">None</option>';
        $result2 = mysqli_query($connect, $sql2);
            while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["sp_id"].'">'.$row1["sp_id"].'</option>';                
        }
            $output .= '</select>
        </td>  
                <td id="amount" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
$output .= '
        <tr>  
                <td id="receipt_id" contenteditable></td>  
                <td id="date" contenteditable></td>  
                <td id="customer_id">'.$customer_id.'</td>  
                <td>';
        $output .= '<select id="sp_id" class="form-control">';
        $output .= '<option value="">None</option>';
        $result2 = mysqli_query($connect, $sql2);
            while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["sp_id"].'">'.$row1["sp_id"].'</option>';                
        }
            $output .= '</select>
        </td>  
                <td id="amount" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
