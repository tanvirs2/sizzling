<?php
include '../../config/config.php';
$contact_name = '';
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sqlGetData = "SELECT * FROM tbl_contact WHERE contact_id = $ID";
    $resultGetData = mysqli_query($con, $sqlGetData);

    if ($resultGetData) {
        $obj = mysqli_fetch_object($resultGetData);
        $contact_name = $obj->contact_name;
    } else {
        
    }
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
                    <title>Thanks From Saad Saan Apprels Ltd.</title>
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
                        <style type="text/css">
                            body{width:100%;background-color:#4c4e4e;margin:0;padding:0;-webkit-font-smoothing:antialiased}html{width:100%}table{font-size:14px;border:0}@media only screen and (max-width: 640px){.header-bg{width:440px !important;height:10px !important}.main-header{line-height:28px !important}.main-subheader{line-height:28px !important}.container{width:440px !important}.container-middle{width:420px !important}.mainContent{width:400px !important}.main-image{width:400px !important;height:auto !important}.banner{width:400px !important;height:auto !important}.section-item{width:400px !important}.section-img{width:400px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:24px !important}.prefooter-subheader{padding:0 10px !important;line-height:24px !important}.top-bottom-bg{width:420px !important;height:auto !important}}@media only screen and (max-width: 479px){.header-bg{width:280px !important;height:10px !important}.top-header-left{width:260px !important;text-align:center !important}.top-header-right{width:260px !important}.main-header{line-height:28px !important;text-align:center !important}.main-subheader{line-height:28px !important;text-align:center !important}.logo{width:260px !important}.nav{width:260px !important}.container{width:280px !important}.container-middle{width:260px !important}.mainContent{width:240px !important}.main-image{width:240px !important;height:auto !important}.banner{width:240px !important;height:auto !important}.section-item{width:240px !important}.section-img{width:240px !important;height:auto !important}.prefooter-header{padding:0 10px !important;line-height:28px !important}.prefooter-subheader{padding:0 10px !important;line-height:28px !important}.top-bottom-bg{width:260px !important;height:auto !important}}
                        </style>
                        </head>
                        <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr><td height="30"></td></tr>
                                    <tr bgcolor="#4c4e4e">
                                        <td width="100%" align="center" valign="top" bgcolor="#4c4e4e">
                                            <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" class="container">
                                                <tbody>
                                                    <tr bgcolor="272727"><td height="5"></td></tr>
                                                    <tr bgcolor="272727">
                                                        <td align="center">
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                <tbody>
                                                                    <tr bgcolor="272727">
                                                                        <td height="10"></td></tr><tr>
                                                                        <td>
                                                                            <table border="0" align="left" cellpadding="0" cellspacing="0" class="top-header-left">
                                                                                <tbody><tr>
                                                                                        <td align="center">
                                                                                            <table border="0" cellpadding="0" cellspacing="0" class="date">
                                                                                                <tbody><tr>
                                                                                                        <td> <i class="fa fa-calendar" aria-hidden="true" style="color: white;"></i>
                                                                                                        </td>
                                                                                                        <td>&nbsp;&nbsp;</td>
                                                                                                        <td mc:edit="date" style="color: #fefefe; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                                                            <singleline>
                                                                                                                <?php echo date('l jS \of F Y'); ?>
                                                                                                            </singleline>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody></table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>

                                                                            <table border="0" align="left" cellpadding="0" cellspacing="0" class="top-header-right">
                                                                                <tbody><tr><td width="30" height="20"></td></tr>
                                                                                </tbody></table>

                                                                            <table border="0" align="right" cellpadding="0" cellspacing="0" class="top-header-right">
                                                                                <tbody><tr>
                                                                                        <td align="center">
                                                                                            <table border="0" cellpadding="0" cellspacing="0" align="center" class="tel">
                                                                                                <tbody><tr>
                                                                                                        <td>
                                                                                                            <i class="fa fa-phone-square" aria-hidden="true" style="color: white;"></i>
                                                                                                        </td>
                                                                                                        <td>&nbsp;&nbsp;</td>
                                                                                                        <td mc:edit="tel" style="color: #fefefe; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                                                            <singleline>
                                                                                                                Call : +(88) 01709-994500
                                                                                                            </singleline>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody></table>
                                                                                        </td>
                                                                                    </tr>					                    	
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr bgcolor="272727">
                                                        <td height="10"></td></tr>
                                                </tbody>
                                            </table>
                                            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="container" bgcolor="ececec">

                                                <tbody><tr bgcolor="ececec"><td height="40"></td></tr>

                                                    <tr>
                                                        <td>
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <table border="0" align="left" cellpadding="0" cellspacing="0" class="logo">
                                                                                <tbody><tr>
                                                                                        <td align="center">
                                                                                            <a href="http://snsapl.com" style="display: block;"><img editable="true" mc:edit="logo" width="155" style="display: block;" src="http://www.snsapl.com/Saad-Saan-Apparels-Ltd-Logo.png" alt="Saad Saan Apparels Limited"></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>		
                                                                            <table border="0" align="left" cellpadding="0" cellspacing="0" class="nav">
                                                                                <tbody><tr>
                                                                                        <td height="20" width="20"></td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                            <table border="0" align="right" cellpadding="0" cellspacing="0" class="nav">
                                                                                <tbody><tr><td height="10"></td></tr>
                                                                                    <tr>
                                                                                        <td align="center" mc:edit="navigation" style="font-size: 13px; font-family: Helvetica, Arial, sans-serif;">
                                                                                            <multiline>
                                                                                                <a style="text-decoration: none; color: #a4a4a4" href="http://www.snsapl.com" target="_blank">Home</a>
                                                                                                <span style="text" class="navSpac">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                                <a style="text-decoration: none; color: #a4a4a4" href="http://www.snsapl.com/about-us.php" target="_blank">About</a>
                                                                                                <span style="text" class="navSpac">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                                                                <a style="text-decoration: none; color: #a4a4a4" href="http://www.snsapl.com/contact-us.php" target="_blank">Contact</a>
                                                                                            </multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>

                                                    <tr bgcolor="ececec"><td height="40"></td></tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                <tbody>
                                                                    <tr bgcolor="ffffff"><td height="7"></td></tr>
                                                                    <tr bgcolor="ffffff"><td align="center"><img style="display: block;" class="main-image" width="538" height="auto" src="http://www.snsapl.com/email/thankyou.jpg" alt="Thanks from Saad Saan Apparels Ltd."></td></tr>
                                                                    <tr bgcolor="ffffff">
                                                                        <td>
                                                                            <table width="528" border="0" align="center" cellpadding="0" cellspacing="0" class="mainContent">
                                                                                <tbody><tr>	
                                                                                        <td mc:edit="title1" class="main-header" style="color: #484848; font-size: 16px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                                            <multiline style>
                                                                                                Thank you for getting in touch!
                                                                                            </multiline>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr><td height="20"></td></tr>
                                                                                    <tr>
                                                                                        <td mc:edit="subtitle1" class="main-subheader" style="color: #a4a4a4; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                                                            <p style="color: black;font-size: 14px;">
                                                                                                <span>Dear <?php echo $contact_name; ?>,<br></span>
                                                                                                We appreciate you contacting us. We will be in touch shortly.<br>
                                                                                                    Have a great day ahead!
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>			

                                                                                </tbody></table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr bgcolor="ffffff"><td height="25"></td></tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">                                                               
                                                                </tbody>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr><td height="35"></td></tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container-middle">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <table border="0" align="center" cellpadding="0" cellspacing="0" class="logo">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <a href="http://snsapl.com" style="display: block;text-align: center;"><img editable="true" mc:edit="logo" width="155" style="display: block;" src="http://www.snsapl.com/Saad-Saan-Apparels-Ltd-Logo.png" alt="Saad Saan Apparels Limited"></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>		                                                                                                                                                        
                                                                        </td>
                                                                    </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>                                                    
                                                    <tr><td height="30"></td></tr>

                                                    <tr>
                                                        <td align="center" mc:edit="copy2" style="color: #939393; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" class="prefooter-subheader">
                                                            <multiline>
                                                                <span style="color: #2f90e2">Marketing Office:</span> House-11/a, Road-48, Concord Baksh Tower, Gulshan-2, Bangladesh.<br>
                                                                    <span style="color: #2f90e2">Factory:</span> Jamirdia, Valuka, Mymensingh-2240, Bangladesh. &nbsp;&nbsp;&nbsp;
                                                            </multiline>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" mc:edit="copy2" style="color: #939393; font-size: 12px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;" class="prefooter-subheader">
                                                            <multiline>
                                                                <span style="color: #2f90e2">Call :</span> +88 01709 994500  &nbsp;&nbsp;&nbsp;<span style="color: #2f90e2">Email :</span> <a href="mailto:info@snsapl.com">info@snsapl.com</a> &nbsp;&nbsp;&nbsp; 
                                                            </multiline>
                                                        </td>
                                                    </tr>
                                                    <tr><td height="30"></td></tr>
                                                </tbody>
                                            </table>
                                            <table border="0" width="600" cellpadding="0" cellspacing="0" class="container">
                                                <tbody><tr bgcolor="272727"><td height="14"></td></tr>
                                                    <tr bgcolor="272727">
                                                        <td mc:edit="copy3" align="center" style="color: #cecece; font-size: 10px; font-weight: normal; font-family: Helvetica, Arial, sans-serif;">
                                                            <multiline>
                                                                Copyright &copy; Saad Saan Apparels Ltd. 2017 . All Rights Reserved.
                                                            </multiline>
                                                        </td>
                                                    </tr>
                                                    <tr bgcolor="272727"><td height="14"></td></tr>                                                        
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr><td height="30"></td></tr>
                                </tbody></table>
                        </body>
                        </html>
                        <?php
                    } else {
                        echo "Incorrect parameter";
                    }