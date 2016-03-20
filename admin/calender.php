<?php
require_once('calendar/classes/tc_calendar.php');
error_reporting(0);
?>

<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>




<form action="report.php" method="post" name="form1" >
              
              <table border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td nowrap></td>
                  <td><?php
					  $myCalendar = new tc_calendar("date5", true, false);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2013, 2037);
					  $myCalendar->dateAllow('2013-01-01', '2037-12-31');
					  $myCalendar->setDateFormat('j F Y');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  $myCalendar->setAlignment('left', 'bottom');
					  $myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
					  $myCalendar->writeScript();
					  ?></td></tr>
                  <tr><td colspan="2"><input type="submit" name="c_date" class="log_submit" value="Check report" /></td>
                </tr>
              </table>
  </form>
