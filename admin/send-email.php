<?php
require './vendor/autoload.php';
$email = new \SendGrid\Mail\Mail();
$email->setFrom("info.clementcareercollege@gmail.com", "Clement Career College");
$email->setSubject("Apply Now form Details");
$email->addTo("hittarth911@gmail.com");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html",
    "<!DOCTYPE html>

        <html lang='en' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml'>
        
        <head>
            <title></title>
            <meta charset='utf-8' />
            <meta content='width=device-width, initial-scale=1.0' name='viewport' />
            
            <style>
                * {
                    box-sizing: border-box;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                }
        
                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: inherit !important;
                }
        
                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                }
        
                p {
                    line-height: inherit
                }
        
                #mobileView {
                    display: block;
                }
        
                #logo {
                  
                   
                    position: relative;
                    left: 0px;
                    padding-left: 0px;
                    margin-left: -220px;
                }
        
                @media (max-width:720px) {
        
                    .fullMobileWidth,
                    .row-content {
                        width: auto !important;
                    }
        
                    .image_block img.big {
                        width: auto !important;
                    }
        
                    .stack .column {
                        width: 100%;
                        display: block;
                    }
        
                    #mobileView {
                        display: none;
                    }
        
                    #logo {
                        width: 80px !important;
                        padding-left: 0px;
                        margin-left: -120px;
                        position: relative;
                        left: 0px;
        
                    }
                }
            </style>
        </head>
        
        <body style='background-color: #F6F7F8; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
            <table border='0' cellpadding='0' cellspacing='0' class='nl-container' role='presentation'
                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F7F8;' width='100%'>
                <tbody>
                    <tr>
                        <td>
                            <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-1'
                                role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' width='100%'>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align='center' border='0' cellpadding='0' cellspacing='0' class='row-content'
                                                role='presentation'
                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;'
                                                width='700'>
                                                <tbody>
                                                    <tr>
                                                        <td class='column'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                            width='33.333333333333336%'>
                                                            <table border='0' cellpadding='0' cellspacing='0'
                                                                class='image_block' role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td
                                                                        style='width:100%;padding-top:15px;padding-right:10px;padding-left:0px;padding-bottom:5px;'>
                                                                        <div align='start' style='line-height:10px'><img
                                                                                alt='Clement Career College'
                                                                                class='fullMobileWidth big' id='logo'
                                                                                src='https://clementcareercollege.org/landing-page-assets/img/landing-page/clement-career-logo.png'
                                                                                style='display: block; height: auto; border: 0; width: 80px; max-width: 100%;'
                                                                                title='Clement Career College' width='80' />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td class='column'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;padding-top: 20px;'
                                                            width='50%'>
                                                            <table border='0' cellpadding='15' cellspacing='0'
                                                                class='button_block' role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div align='right'>
                                                                                
                                                                                <a	href='https://clementcareercollege.org/admin'
                                                                                    style='text-decoration:none;display:inline-block;color:#F6F7F8;background-color:#253B4A;border-radius:4px;width:auto;border-top:0px solid #8a3b8f;border-right:0px solid #8a3b8f;border-bottom:0px solid #8a3b8f;border-left:0px solid #8a3b8f;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;'
                                                                                    target='_blank'><span
                                                                                        style='padding-left:20px;padding-right:20px;font-size:16px;display:inline-block;letter-spacing:normal;'><span
                                                                                            style='font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;'>Login</span></span></a>
                                                                                
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-2'
                                role='presentation'
                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F7F8;' width='100%'>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align='center' border='0' cellpadding='0' cellspacing='0'
                                                class='row-content stack' role='presentation'
                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;'
                                                width='700'>
                                                <tbody>
                                                    <tr>
                                                        <td class='column'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                            width='50%'>
                                                            <table border='0' cellpadding='0' cellspacing='0'
                                                                class='divider_block' role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td
                                                                        style='padding-top:10px;padding-right:15px;padding-bottom:5px;padding-left:20px;'>
                                                                        <div align='center'>
                                                                            <table border='0' cellpadding='0' cellspacing='0'
                                                                                role='presentation'
                                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                                width='100%'>
                                                                                <tr>
                                                                                    <td class='divider_inner'
                                                                                        style='font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;'>
                                                                                        <span> </span>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table border='0' cellpadding='0' cellspacing='0'
                                                                class='heading_block' role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td
                                                                        style='width:100%;text-align:center;padding-top:20px;padding-right:15px;padding-bottom:3px;padding-left:15px;'>
                                                                        <h1
                                                                            style='margin: 0; color: #2b2d2d; font-size: 20px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; line-height: 100%; text-align: left; direction: ltr; font-weight: normal; letter-spacing: normal; margin-top: 0; margin-bottom: 0;'>
                                                                            <strong>Dear,</strong> Team
                                                                        </h1>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                    
                                                            <table border='0' cellpadding='0' cellspacing='0' class='text_block'
                                                                role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td
                                                                        style='padding-top:10px;padding-right:15px;padding-bottom:10px;padding-left:15px;'>
                                                                        <div style='font-family: sans-serif'>
                                                                            <div
                                                                                style='font-size: 14px; mso-line-height-alt: 28px; color: #6f7077; line-height: 2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
                                                                                <p style='margin: 0; font-size: 14px;'>
                                                                                    <strong><span style='font-size:15px;'>" . $name . "
                                                                                            has just reached out clement career
                                                                                            college and filled apply now form.
                                                                                        </span></strong>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table border='0' cellpadding='0' cellspacing='0' class='text_block'
                                                            role='presentation'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'
                                                            width='100%'>
                                                            <tr>
                                                                <td
                                                                    style='padding-top:0px;padding-right:15px;padding-bottom:10px;padding-left:15px;'>
                                                                    <div style='font-family: sans-serif'>
                                                                        <div
                                                                            style='font-size: 14px; mso-line-height-alt: 28px; color: #6f7077; line-height: 2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
                                                                            <p style='margin: 0; font-size: 14px;'>
                                                                                <strong><span style='font-size:15px;'>Here is details for the applicant :
                                                                                    </span></strong>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                            <table border='0' cellpadding='0' cellspacing='0' class='text_block'
                                                                role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td
                                                                        style='padding-top:0px;padding-right:15px;padding-bottom:10px;padding-left:15px;'>
                                                                        <div style='font-family: sans-serif'>
                                                                            <div
                                                                                style='font-size: 14px; mso-line-height-alt: 28px; color: #6f7077; line-height: 2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
                                                                                <p style='margin: 0; font-size: 14px;'>
                                                                                    <strong><span style='font-size:15px;'>
                                                                                            Name : " . $name . " <br>
                                                                                            Email Address : " . $emails . " <br>
                                                                                            Phone Number : " . $phone . " 
                                                                                        </span></strong>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        
        
                                                        </td>
                                                        <td class='column'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                            width='50%'>
                                                            <table border='0' cellspacing='0' class='image_block'
                                                                role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td>
                                                                        <div align='center' style='line-height:10px'><img
                                                                                alt='Services Company'
                                                                                class='fullMobileWidth big'
                                                                                src='https://clementcareercollege.org/assets/images/about.png'
                                                                                style='display: block; height: auto; border: 0; width: 350px; max-width: 100%;'
                                                                                title='Services Company' width='350' /></div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <table align='center' border='0' cellpadding='0' cellspacing='0' class='row row-4'
                                role='presentation'
                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F6F7F8;' width='100%'>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table align='center' border='0' cellpadding='0' cellspacing='0'
                                                class='row-content stack' role='presentation'
                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 700px;'
                                                width='700'>
                                                <tbody>
                                                    <tr>
                                                        <td class='column'
                                                            style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 25px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'
                                                            width='100%'>
                                                            <table border='0' cellpadding='10' cellspacing='0'
                                                                class='divider_block' role='presentation'
                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                width='100%'>
                                                                <tr>
                                                                    <td>
                                                                        <div align='center'>
                                                                            <table border='0' cellpadding='0' cellspacing='0'
                                                                                role='presentation'
                                                                                style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'
                                                                                width='100%'>
                                                                                <tr>
                                                                                    <td class='divider_inner'
                                                                                        style='font-size: 1px; line-height: 1px; border-top: 0px solid #BBBBBB;'>
                                                                                        <span> </span>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </body>
        
        </html>"
);
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    $emailOne = "success";
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
