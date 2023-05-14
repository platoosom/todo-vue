<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
	
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
    a:link {color: #EE333C;}  
    </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  
  <style>
    table, td, div, h1, p {
      font-family: Arial, sans-serif;
    }
    @media screen and (max-width: 530px) {
      .unsub {
        display: block;
        padding: 8px;
        margin-top: 14px;
        border-radius: 6px;
        background-color: #555555;
        text-decoration: none !important;
        font-weight: bold;
      }
      .col-lge {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 531px) {
      .col-sml {
        max-width: 27% !important;
      }
      .col-lge {
        max-width: 73% !important;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#FFFFFF;">
  <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#FFFFFF;">
    <table role="presentation" style="width:100%;border:none;border-spacing:0;">
      <tr>
        <td align="center" style="padding:0;">
          
          <table role="presentation" align="center" style="width:600px;">
          <tr>
          <td>
          
          <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
            <tr>
              <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                <a href="http://www.example.com/" style="text-decoration:none;"><img src="{{ asset('images/port360-logo.png') }}" width="165" alt="Logo" style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
              </td>
            </tr>
            <tr>
                <td>
                    <table style="border: #cccccc solid 1px;color:#555555;">
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;color:#1E2248">Hello {{ $task->assignto()->first()->name }},</h1>
                                <p style="margin:0;">
                                    A new task ({{ $task->company }} {{ $task->subject }}) is assigned to you.
                                </p>
                            </td>
                        </tr>
                        <tr style="background-color: #1E2248;">
                            <td  style="padding-left:30px;">
                                <p style="color:white;">Task detail</p>
                            </td>
                        </tr>
                        <tr>
                        <td style="padding:35px 30px 11px 30px;background-color:#ffffff;border-color:rgba(201,201,207,.35);">
                            <table role="presentation" width="100%">
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Subjet/Objective  
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->subject }} 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Duedate  
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->duedate }} {{ $task->duetime }} (UTC Time) 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Priority  
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ Str::upper($task->priority) }} 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Task Type  
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->tasktype }} 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Company   
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->company }} 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Contact    
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->contact }} 
                                    </td>
                                </tr>   
                                <tr>
                                    <td style="width:145px; font-weight:bold;" align="left" valign="top">
                                        Created By     
                                    </td>
                                    <td style="width:395px;padding-bottom:10px;" valign="top">
                                        {{ $task->owner()->first()->name }} 
                                    </td>
                                </tr>  
                            </table>
                            
                        </td>
                        </tr>
                        <tr>
                            <td style="padding:50px;font-size:18px;line-height:28px;font-weight:bold;background-color:#ffffff; text-align:center;">
                                <a href="#" style="background-color: #EE333C; color: white; padding: 15px 25px; text-decoration: none;">View Task</a> 
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <p style="margin:0;">Regards,</p>
                                <p style="margin:0;font-size:22px;font-weight:bold;"><span style="color:#1E2248">Port</span><span style="color: #EE333C;">360</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px 30px 0px 30px;background-color:#ffffff;">
                                <hr />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:0px 30px 60px 30px;background-color:#ffffff;">
                                <p>
                                    If you're having trouble clicking the "View Task" button, copy and paste
                                    the URL below into your web browser. <a href="{{ route('todo.view', $task->id) }}">{{ route('todo.update') }}</a>  
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
          </table>
          
          </td>
          </tr>
          <tr>
            <td style="padding: 30px 0px; text-align:center; color:#CCCCCC; font-size:14px;">
                <p>@2023 port360. All right reserved.</p>
            </td>
          </tr>
          </table>
          
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
