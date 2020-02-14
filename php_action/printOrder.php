<?php    

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT recipe_name, customer_name FROM recipes WHERE recipe_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$recipeName = $orderData[0];
$customerName = $orderData[1];


$orderItemSql = "SELECT recipe_item.products_id, recipe_item.products_detail, recipe_item.quantity,
products.products_name FROM recipe_item
   INNER JOIN products ON recipe_item.products_id = products.products_id 
 WHERE recipe_item.recipe_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<table align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:1px solid black;margin-bottom: 10px;">
               <tbody>
                  <tr>
                     <td colspan="4" style="padding: 0px;vertical-align: top;border-right:1px solid black;">
                        <table align="left" cellpadding="0" cellspacing="0" style="border: thin solid black; width: 100%">
                           <tbody>
                              <tr>
                                 <td style="width: 35%; border-style: solid; border-width: thin; border-color: black; text-align: right;color: black; font-weight: bold;">Product Name :</td>
                                 <td style="border-style: solid; border-width: thin; border-color: black;text-align: center;color: black;">&nbsp;'.$recipeName.'</td>
                              </tr>
                           </tbody>
                        </table>
                        <table align="left" cellspacing="0" style="width: 100%; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-width: thin; border-bottom-width: thin; border-left-width: thin; border-right-color: black; border-bottom-color: black; border-left-color: black;">
                           <tbody>
                              <tr>
                                 <td style="width: 35%; border-style: solid; border-width: thin; border-color: black; text-align: right;color: black; font-weight: bold;">Customers Using the Recipe :</td>
                                 <td style="border-style: solid; border-width: thin; border-color: black;text-align: center;color: black;">'.$customerName.'</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 5%;text-align: center;background-color: black;color: white;border-right: 1px solid white;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact; font-weight: bold;">#</td>
                     <td style="width: 30%;text-align: center;background-color: black;color: white;border-right: 1px solid white;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact; font-weight: bold;">Product Name</td>
                     <td style="width: 50%;text-align: center;background-color: black;color: white;border-right: 1px solid white;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact; font-weight: bold;">Product Detail / Explanation</td>
                     <td style="width: 15%;text-align: center;background-color: black;color: white;border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact; font-weight: bold;">Quantity</td>
                  </tr>';
                  $x = 1;
            while($row = $orderItemResult->fetch_array()) {       
                        
               $table .= '<tr>
                     <td style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: center; border-right: 1px solid black;height: 27px;">'.$x.'</td>
                     <td style="border-bottom: 1px solid black; height: 27px;">'.$row[3].'</td>
                     <td style="border-bottom: 1px solid black; border-left: 1px solid black; height: 27px;">'.$row[1].'</td>
                     <td style="border-bottom: 1px solid black; border-left: 1px solid black; text-align: center; border-right: 1px solid black; height: 27px;">'.$row[2].'</td>
                  </tr>
               ';
            $x++;
            } // /while
                '</tbody>
            </table>';
$connect->close();

echo $table;