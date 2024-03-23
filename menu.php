<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
   * {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: "Poppins", sans-serif;
}

header {
	position: sticky;
	margin: 0;
	top: 0;
	z-index: 10;
	background-color: #0b5510;
	height: 80px;
	width: 100%;
	box-sizing: border-box;
	padding: 0;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

header .logo {
	padding: 10px 100px;
	position: relative;
	line-height: 50px;
	color: #fff;
	height: 70px;
	font-size: 35px;
	font-weight: bold;
	cursor: pointer;
}
header .logo a{
	text-decoration:none;
	color:#fff;
}
header .logo a:hover{
	background-color:#0b5510;
}

header ul {
	float: right;
	margin-right: 20px;
}

header ul li {
	padding: 0 10px;
	margin: 0 5px;
	line-height: 80px;
	list-style: none;
	display: inline-block;
}

header ul li a {
	color: white;
	font-size: 17px;
	text-transform: uppercase;
	padding: 7px 13px;
	border-radius: 3px;
	text-decoration: none;
}

header ul li a .resize, a:hover {
	background-color:white;
	color: black;
	transition: .5s;
}

.checkbtn {
	font-size: 30px;
	color: white;
	float: right;
	line-height: 80px;
	margin-right: 40px;
	cursor: pointer;
	display: none;
}

#check {
	display: none;
}

@media(max-width:950px) {
	label.logo {
		font-size: 30px;

	}

	header ul li a {
		font-size: 16px;
	}
}

@media(max-width:858px) {
	.checkbtn {
		display: block;
	}

	header ul {
		position: fixed;
		width: 100%;
		height: 100vh;
		background: #0b5510;
		top: 80px;
		left: -100%;
		text-align: center;
		transition: all .5s;
	}

	header ul li {
		display: block;
		margin: 50px 0;
		line-height: 30px;
	}

	header ul li a {
		font-size: 20px;
	}

	header ul li a:hover, a .resize {
		background: none;
		background-color: #fff;
		color: black;

	}

	#check:checked~ul {
		left: 0;
	}
}
    </style>
</head>

<body>
    <header>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <Label class="logo"><a id="home" href="home.php">SPEEDY</a></Label>
        <ul>
            <li><a class="resize" href="home.php">Home</a></li>
            <li><a class="resize" href="typing.php">Start Typing</a></li>
            <li><a class="resize" href="tips.php">Typing Tips</a></li>
            <li><a class="resize" href="result.php">Result</a></li>
            <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<li><a class="resize" href="home.php" id="log">Logout</a></li>';
    } else {
        echo '<li><a class="resize" href="loginpage.php" id="sign">Login</a></li>';
        
    }
    ?>
        </ul>
    </header>
    <script>
    document.addEventListener("DOMContentLoaded",
    function() { //fired when HTML document is completely loaded and parsed
        <?php if (isset($_SESSION['user_id'])): ?>
        document.getElementById("sign").style.display = "none";
        document.getElementById("log").style.display = "flex";
        <?php else: ?>
        document.getElementById("log").style.display = "none";
        document.getElementById("sign").style.display = "flex";
        <?php endif; ?>
    });

    document.getElementById("log").addEventListener("click", function() {
        fetch("logout.php", {  //a fetch request to the logout.php on the server using the POST method, perfromed for logout activity
                method: "POST"
            })
            .then(function(response) { //executed when the fetch request receives a response from the serve
                if (response.ok) { //checks if the response status is within the range of 200-299, indicating a successful response
                    location.reload(); //reloads the current page
                } else {
                    console.log(
                    "Logout failed"); //error message to the browser console if the response status is not successful
                }
            })
            .catch(function(error) { // executed if there is an error during the fetch request
                console.log(error);
            });
    });
    </script>
</body>

</html>