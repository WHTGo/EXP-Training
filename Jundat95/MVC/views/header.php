<html>
<head>
    <title>Jundat95</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" >
    <script type="text/javascript" src="<?php echoURL; ?>public/js/jQuery.js">
    </script>
</head>
<body>
    <div id="header">
        <h4>Header</h4>
        <div id="menu">
            <ul>
                <li><a href="<?php echo URL; ?>Index">Home</a></li>
                <li><a href="<?php echo URL; ?>Order">Order</a>
                    <ul>
                        <li><a href="<?php echo URL; ?>Order/Add">Add</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo URL; ?>User">User</a>
                    <ul>
                        <li><a href="<?php echo URL; ?>User/Login">Login</a></li>
                        <li><a href="<?php echo URL; ?>User/Signup">Signup</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo URL; ?>Help">Help</a></li>
            </ul>
        </div>
    </div>
    <div id="content">
