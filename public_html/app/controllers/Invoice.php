<?php

	class Invoice extends Controller{
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
			//$this->view->setLayout('common');
			//$this->load_model('Common');	

		}

		public function indexAction()
		{			
           
			$newUser=new Users();
            if(isset($_GET['invoiceid']))
            {
                $bidid = base64_decode($_GET['invoiceid']); 
                require_once(ROOT .DS. 'dompdf' .DS. 'autoload.inc.php');
                // reference the Dompdf namespace
                use Dompdf\Dompdf;

                // instantiate and use the dompdf class
                $dompdf = new Dompdf();

                ob_start();
                ?>
                <style>
                    .header
                    {
                        width: 100%;
                    }
                    .header img
                    {
                        width: 200px;
                        padding: 10px;
                    }
                    .user
                    {
                        width: 100%;
                    }
                    table td
                    {
                        padding-left:10px;
                    }
                    .user th
                    {
                        background: #ccc;
                        text-align: left;
                        padding-left:10px; 
                    }
                    .vendor th
                    {
                        background: #fff;
                        text-align: left;
                        padding-left:10px; 
                    }
                    .qty
                    {
                        width: 100%;
                        margin-top: 50px;
                    }
                    .qty th
                    {
                        background: #ccc;
                        text-align: center;
                        padding:10px; 
                        border:1px solid #ccc;
                    }
                    .qty td
                    {
                        padding:10px; 
                        border:1px solid #ccc;
                    }
                    .total
                    {
                        width: 100%;
                    }
                    .thanks
                    {
                        text-align: center;
                        font-weight: bold;
                        border: none;
                    }
                </style>

                <table class="header">
                    <tr>
                        <td><img src="https://broombids.com//images/maillogo.png"></td>
                        <td>Invoice Number :  000111 <br> Date : 19-09-2020</td>
                    </tr>
                </table>

                <table class="user">
                    <tr>
                        <th>Bill To </th>
                        <th>Ship To </th>
                    </tr>
                    <tr>
                        <td>
                            <table class="vendor">
                                <tr>
                                    <th>Company Name:</th>
                                    <td>Cadeline</td>
                                </tr>
                                <tr>
                                    <th>Person Name:</th>
                                    <td>Prakash Chanpura</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>At : Dhokalva Ta: Chotila Dest : Surendranagar</td>
                                </tr>
                                <tr>
                                    <th>Zip:</th>
                                    <td>363520</td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td>9429511931</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>cadelineweb@gmail.com</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="vendor">
                                <tr>
                                    <th>Company Name:</th>
                                    <td>Cadeline</td>
                                </tr>
                                <tr>
                                    <th>Person Name:</th>
                                    <td>Prakash Chanpura</td>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <td>At : Dhokalva Ta: Chotila Dest : Surendranagar</td>
                                </tr>
                                <tr>
                                    <th>Zip:</th>
                                    <td>363520</td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td>9429511931</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>cadelineweb@gmail.com</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <table class="qty">
                    <tr>
                        <th>Item No</th>
                        <th>Description</th>
                        <th>Broom Amount</th>
                    </tr>
                    <tr>
                        <td>0202</td>
                        <td>I want my car </td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td colspan="2">Make All amount payable to <br>Bank Name : <br>Account Number : <br>Company Name : </td>
                        <td>
                            <table class="total">
                                <tr>
                                    <th>Total</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tax 3%</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Grand Total</th>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="thanks">
                            Thank You!<br>
                            we appreciate your business
                        </td>
                    </tr>
                </table>
                <?php
                $html = ob_get_clean();
                $dompdf->loadHtml($html);

                // (Optional) Setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // Render the HTML as PDF
                $dompdf->render();

                // Output the generated PDF to Browser
                $dompdf->stream('resulta.pdf',Array('Attachment'=>0));
            }
            
		}
		

		

	}