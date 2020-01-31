<?php    

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_place,gstn FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];
$payment_place = $orderData[10];
$gstn = $orderData[11];


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
   INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '<style>
.star img {
    visibility: visible;
}</style>
<table align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:1px solid black;margin-bottom: 10px;">
               <tbody>
                  <tr>
                     <td colspan="5" style="text-align:center;color: red;text-decoration: underline;    font-size: 25px;">VERGİ FATURASI</td>
                  </tr>
                  <tr>
                     <td rowspan="8" colspan="2" style="border-left:1px solid black;" background-image="logo.png"><img src="/logo.png" alt="logo" width="250px;"></td>
                     <td colspan="3" style=" text-align: right;">ORİJİNAL</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">KOPYA</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;color: red;font-style: italic;font-weight: 600;text-decoration: underline;font-size: 25px;">İrsaliye</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Akhisar Organize Sanayi Bölgesi 5.Cad. No:26-28,</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">45200, Akhisar/Manisa</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Telefon: 444 8 223</td>
                  </tr>
                  <tr>
                     <td colspan="3" style=" text-align: right;">Eposta: info@batuhansaygin.com</td>
                  </tr>
                  <tr>
                     <td colspan="2" style="padding: 0px;vertical-align: top;border-right:1px solid black;">
                        <table align="left" cellpadding="0" cellspacing="0" style="border: thin solid black; width: 100%">
                           <tbody>
                              <tr>
                                 <td style="width: 74px;vertical-align: top;color: red;" rowspan="3">Sayın, </td>
                                 <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: red">&nbsp;'.$clientName.'</td>
                              </tr>
                              <tr>
                                 <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black">&nbsp;</td>
                              </tr>
                              <tr>
                                 <td style="border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: black">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                        <table align="left" cellspacing="0" style="width: 100%; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-right-width: thin; border-bottom-width: thin; border-left-width: thin; border-right-color: black; border-bottom-color: black; border-left-color: black;">
                           <tbody>
                              <tr>
                                 <td style=" border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: red;color: red;">KDV Mik. :'.$gstn.'</td>
                                 <td style="border-left-style: solid; border-left-width: thin; border-left-color: black; border-bottom-style: solid; border-bottom-width: thin; border-bottom-color: red;color: red;">Mobile No: '.$clientContact.'</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td style="padding: 0px;vertical-align: top;" colspan="3">
                        <table align="left" cellpadding="0" cellspacing="0" style="width: 100%">
                           <tbody>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-top: 1px solid black;border-right: 1px solid black;color: red;">Fatura No : .</td>
                              </tr>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-right: 1px solid black; color: red;">Tarih: '.$orderDate.'</td>
                              </tr>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;height: 52px;border-right: 1px solid black; color: red;">KDV: %18</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 123px;text-align: center;background-color: black;color: white;border-right: 1px solid white;border-left: 1px solid black;border-bottom: 1px solid black;-webkit-print-color-adjust: exact;">No<br>
                     </td>
                     <td style="width: 50%;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: white;border-bottom-color: black;color: white;background-color: black;-webkit-print-color-adjust: exact;">Ürün Adı</td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #fff;border-bottom-color: black;background-color: black;color: white;-webkit-print-color-adjust: exact;">Miktarı</td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #fff;border-bottom-color: black;background-color: black;color: white;-webkit-print-color-adjust: exact;">Adet Fiyatı<br>
                     </td>
                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;color: white;background-color: black;-webkit-print-color-adjust: exact;">Tutarı<br>
                     </td>
                  </tr>';
                  $x = 1;
                  $cgst = 0;
                  $igst = 0;
                  if($payment_place == 2)
                  {
                     $igst = $subTotal*18/100;
                  }
                  else
                  {
                     $cgst = $subTotal*9/100;
                  }
                  $total = $subTotal+2*$cgst+$igst;
            while($row = $orderItemResult->fetch_array()) {       
                        
               $table .= '<tr>
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$x.'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row[4].'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row[2].'</td>
                     <td style="border-left: 1px solid black;height: 27px;">'.$row[1].'</td>
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;">'.$row[3].'</td>
                  </tr>
               ';
            $x++;
            } // /while
                $table.= '
                  <tr style="border-bottom: 1px solid black;">
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="width: 149px;border-right-style: solid;border-bottom-style: solid;border-right-width: thin;border-bottom-width: thin;border-right-color: black;border-bottom-color: #000;background-color: black;color: white;padding-left: 5px;-webkit-print-color-adjust: exact;">Toplam</td>
                     <td style="width: 218px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-top-color: black; border-right-color: black; border-bottom-color: black;">'.$subTotal.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-top: 1px solid black;border-bottom: 1px solid black;border-left: 1px solid black;padding: 5px;">Banka: ...</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 199px;color: white;background-color: black;padding-left: 5px;-webkit-print-color-adjust: exact;">A Vergisi 9%</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 288px;border-right: 1px solid black;">'.$cgst.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-bottom: 1px solid black;width: 859px;border-left: 1px solid black;padding: 5px;">Branch:- branch Address</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-bottom: 1px solid black;border-left: 1px solid black;padding: 5px;">Bank IFSC CODE:- 78945612301</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 149px;background-color: black;color: white;padding-left: 5px;-webkit-print-color-adjust: exact;">B Vergisi 9%</td>
                     <td rowspan="2" style="width:218px;border-bottom: 1px solid black;border-right: 1px solid black;">'.$cgst.'
                     </td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-bottom: 1px solid black;border-left: 1px solid black;padding: 5px;">AC. HO. Name:- Comapany Name</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-bottom: 1px solid black;border-left: 1px solid black;padding: 5px;">AC.NO. :- lorem ipsum</td>
                     <td style="border-bottom: 1px solid black;background-color: black;color: white;padding: 5px;-webkit-print-color-adjust: exact;">C Vergisi 18%</td>
                     <td style="border-bottom: 1px solid black;border-right: 1px solid black;">'.$igst.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;color: red;padding: 5px;">Amount in words</td>
                     <td style="border-bottom: 1px solid #fff;background-color: black;color: white;padding: 5px;-webkit-print-color-adjust: exact;">KDV Dahil</td>
                     <td style="border-bottom: 1px solid black;border-right: 1px solid;">'.$total.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;border-bottom: 1px solid black;padding: 5px;border-right: 1px solid black;">* Subject to lorem ipsum             <span style="float: right;"> E.&amp;.O.E.</span></td>
                     <td rowspan="2" colspan="2" style="vertical-align: bottom;padding: 5px;color: red;border-right: 1px solid black;text-align: center;">for, Company Name</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;padding-left: 5px;border-right: 1px solid black;">
                        * Intrest will be charged upon all acounts 
                        <p style="margin: 0px;">remaning unpaid after due date</p>
                     </td>
                  </tr>
               </tbody>
            </table>';
$connect->close();

echo $table;