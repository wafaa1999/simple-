<?php
if(isset($_POST['sysName']) && isset($_POST['sysContact']) ) {
    snmp2_set('localhost', 'public', '1.3.6.1.2.1.1.5.0','s',$_POST['sysName']);
    snmp2_set('localhost', 'public', '1.3.6.1.2.1.1.4.0','s',$_POST['sysContact']);
    snmp2_set('localhost', 'public', '1.3.6.1.2.1.1.6.0','s',$_POST['sysLocation']);

}
?>

<html>
<head>
    <style>
        body {
            box-sizing: border-box;
            background-color: white;
        }
        nav {
            position: absolute;
            top: 0;
            left: 0;
            margin-bottom: 20px;
            width: 100%;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: blueviolet;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover {
            background-color: #111;
        }
        .head {
            margin-top: 50px;
            margin-bottom: 20px;
            text-align: center;
            font-style: italic;
            font-size: 50px;
            color: blueviolet;
        }
        .SystemGroup {
            border: 1px solid wheat;
            border-radius: 5px;
            box-shadow: 0px 2px 4px #aaaaaa;
            background-color: blueviolet;
            width: 80%;
            margin: 50px auto ;
            color: #0a2b1d;
            padding: 10px;
            padding-bottom: 50px;
            overflow: auto;
        }
        .SystemGroup h3 {
            text-align: center;
        }
        table, th, td {
            border: 1px solid #0a2b1d;
            border-collapse: separate;
            margin: auto;
        }
        table tr:nth-child(even) {
            background-color: #eee;
        }
        table tr:nth-child(odd) {
            background-color: #d7d7d7;
        }
        td {
            padding: 10px;
        }
        th {
            background-color: whitesmoke;
        }
        .buttons {
            margin-top: 10px;
            text-align: center;
        }
        .form input {
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 20px;
        }
        .btn {
            margin-top: 20px;
            padding: 15px;
            background-color: #186947;
            color: black;
            font-size: 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .btn:hover,
        .btn:active {
            background-color: #10e88d;
            transform: scaleX(1.1);
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a class="active" href="#SystemGroupContent">System Group Content</a></li>
        <li><a href="#t3">UDP Table</a></li>
        <li><a href="#t4">Interface Table</a></li>
    </ul>
</nav>
<h1 class="head">
    SNMP MANAGER
</h1>
<div class="SystemGroup" id="SystemGroupContent">
    <h3>System Group Content</h3>
    <div>
        <?php
        echo "<table>";
        echo "<tr><th>Node</th><th>Value</th></tr>";
        /////
        $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.1.0');
        echo "<tr>
                        <td>sysDescr</td>
                        <td>$sysDescr</td>
                      </tr>";
        /////
        /////
        $sysObjectID  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.2.0');
        echo "<tr>
                        <td>sysObjectID</td>
                        <td>$sysObjectID</td>
                      </tr>";
        ///
        /////
        $sysUpTime  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.3.0');
        echo "<tr>
                        <td>sysUpTime</td>
                        <td>$sysUpTime</td>
                      </tr>";
        //
        /////
        $sysContact  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.4.0');
        echo "<tr>
                        <td>sysContact</td>
                        <td>$sysContact</td>
                      </tr>";
        //
        /////
        $sysName  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.5.0');
        echo "<tr>
                        <td>sysName</td>
                        <td>$sysName</td>
                      </tr>";
        //
        /////
        $sysLocation  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.6.0');
        echo "<tr>
                        <td>sysLocation</td>
                        <td>$sysLocation</td>
                      </tr>";
        //
        /////
        $sysServices  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.1.7.0');
        echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
        //
        echo "</table>";
        ?>
    </div>


    <div class="buttons">
        <form class="form" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
            <input type="text" placeholder="sysContact" name="sysContact" required>
            <input type="text" placeholder="sysName" name="sysName" required>
            <input type="text" placeholder="sysLocation" name="sysLocation" required>
            </br>
            <button type="submit" class="btn">Change Values</button>
        </form>
    </div>
</div>

<div>
    <?php
    echo "<table>";


    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.1.0');


   /* echo "<tr>
                     
                        <td>$sysDescr</td>


                     
 
   $sysObjectID  snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.2.1.3.1');
   
                       
                        <td>$sysObjectID</td>
                      </tr>";

    ///
    /////
    $sysDescr1  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.1.0');
   /* echo "<tr>
                        <td>sysUpTime</td>
                        <td> $sysDescr1</td>
                      </tr>";
    //
    /////
    $sysDescr2  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.1.0');
    echo "<tr>
                        <td>sysContact</td>
                        <td> $sysDescr2</td>
                      </tr>";
    //
    /////
    $sysDescr3  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.4.0');
    echo "<tr>
                        <td>sysName</td>
                        <td> $sysDescr3</td>
                      </tr>";*/
    //
   /* /////
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.5.0');
    echo "<tr>
                        <td>sysLocation</td>
                        <td>$sysLocation</td>
                      </tr>";
    //
    /////
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.6.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.7.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.8.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.9.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.10.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.11.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.12.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.13.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.14.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.15.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.16.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.17.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.18.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.19.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.20.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";
    $sysDescr  = snmp2_get('localhost', 'public', '1.3.6.1.2.1.2.21.0');
    echo "<tr>
                        <td>sysServices</td>
                        <td>$sysServices</td>
                      </tr>";

    //  */

    echo "</table>";
    ?>
    <div class="SystemGroup" id="SystemGroupContent">
        <h3>UDP Table</h3>
        <div>
<div class="SystemGroup" id="SystemGroupContent">
    <table >
        <tr>
            <?php
            $i = 0;

            $a2 = snmp2_walk("localhost", "public", "1.3.6.1.2.1.7");
            while($i < count($a2)){ ?>
            <td ><?php echo $a2[$i]; ?></td>
            <?php $i++;
            if($i%5==0 and $i!=0){?>
        </tr>
        <tr>
            <?php
            }
            }
            ?>

        </tr>
    </table>


    <table >
        <tr>

        </tr>
    </table>

    <div id="SystemGroupContent">
        <h3>Interface Table</h3>
        <div>
    <table >
        <tr>
            <?php
            $i = 0;

            $a2 = snmp2_walk("localhost", "public", "1.3.6.1.2.1.2");
            while($i < count($a2)){ ?>
            <td><?php echo $a2[$i]; ?></td>
            <?php $i++;
            if($i%5==0 and $i!=0){?>
        </tr>
        <tr>
            <?php
            }
            }
            ?>

        </tr>
    </table>

</div>
</div>

</body>
</html>