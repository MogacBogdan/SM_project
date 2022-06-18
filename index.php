<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" />
<title>Control Robot using Apache Webserver </title>
</head>
        <style>
        body
        {
                background-color: rgb(212,250,252);
                font-family: 'Arial';

        }
        .inainte {
                background-color: red;
                width: 10em; height: 4em;
                font-size: 20px;
        }
        .yellow {
                background-color: yellow;
                width: 10em; height: 4em;
                font-size: 20px;
        }
        .green {
                background-color: green;
                width: 10em; height: 4em;
                font-size: 20px;
        }
        .blue{
                background-color: blue;
                width: 10em; height: 4em;
                font-size: 20px;
        </style>

       <body>
       <center>
        <h1>Control proiect from server</h1>
         <form method="get" action="index.php">
            <input class ="yellow" type="submit"  value="Forward" name="inainte">

            <input class="green" type="submit" value="Backwards" name="inapoi">
            <br /> <br />
            <input class="inainte" type="submit" value="STOP" name="stop">
            <br /> <br />
            <input class="yellow" type="submit" value="Right" name="dreapta">

            <input class="green" type="submit" value="Left" name="stanga">
            <br /> <br />
            <input class="inainte" type="submit" value="Picture" name="poza">
            <br /> <br />
            <input class="yellow" type="submit" value="OPEN CLAW" name="deschide">

            <input class="green" type="submit" value="CLOSE CLAW" name="inchide">
            <br /> <br />
            <img scr="/img.jpg" width="720" height="480">
        </form>

      </center>
<?php
        shell_exec("gpio -g mode 23 out");
        shell_exec("gpio -g mode 27 out");
        shell_exec("gpio -g mode 24 out");
        shell_exec("gpio -g mode 22 out");

    if(isset($_GET['inainte']))
    {
        shell_exec("gpio -g write 23 1");
        shell_exec("gpio -g write 27 1");
    }
    else if(isset($_GET['inapoi']))
    {
        shell_exec("gpio -g write 24 1");
        shell_exec("gpio -g write 22 1");
    }
        else if(isset($_GET['stop']))
        {
                shell_exec("gpio -g write 23 0");
                shell_exec("gpio -g write 22 0");
                shell_exec("gpio -g write 27 0");
                shell_exec("gpio -g write 24 0");
        }
 	else if(isset($_GET['dreapta']))
        {
                shell_exec("gpio -g write 23 1");
                shell_exec("gpio -g write 22 1");
        }
        else if(isset($_GET['stanga']))
        {
                shell_exec("gpio -g write 27 1");
                shell_exec("gpio -g write 24 1");
        }

        else if(isset($_GET['poza']))
        {
                shell_exec("sudo python /home/pi/Desktop/camera/camera.py");
        }
        else if(isset($_GET['deschide']))
        {
                shell_exec("sudo python /home/pi/Desktop/servo/deschide.py");
        }
        else if(isset($_GET['inchide']))
        {
                shell_exec("sudo python /home/pi/Desktop/servo/serv.py");
        }

?>
   </body>
</html>
