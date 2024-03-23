<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: gainsboro;
    }

    section {
        width: 350px;
        height: auto;
        padding: 2rem 1rem;
        margin: 250px auto;
        background-color: white;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0)
    }

    h1 {
        font-size: 2rem;
        color: #0b5510;
        margin-bottom: 1.2rem;
    }

    h1 {
        font-size: 2rem;
        color: #0b5510;
        margin-bottom: 1.2rem;
    }

    form input {
        width: 92%;
        outline: none;
        border: 1px solid white;
        padding: 12px 20px;
        margin-bottom: 10px;
        border-radius: 20px;
        background: rgb(236, 234, 234);
        margin-top: 10px;
    }

    .save {
        font-size: 1rem;
        padding: 10px 0;
        width: 50%;
        cursor: pointer;
        color: white;
        background-color: #0b5510;
    }

    .label {
        font-size: 20px;
        color: #0b5510;
    }

    .errorm {
        color: red;
    }
    </style>
</head>

<body>
    <section>
        <h1>Edit User Detail</h1>
        <form method="post" action="editvalue.php" onsubmit="return validate()">
            <label for="fname" class="label">First Name:</label>
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <br>
            <label for="lname" class="label">Last Name:</label>
            <input type="text" name="lname" id="lname" placeholder="Last Name">
            <br>
            <label for="email" class="label">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email">
            <br>

            <input type="submit" value="Save" class="save">
        </form>
        <p class="errorm"></p>
    </section>
    <script>
    function validate() {
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var email = document.getElementById("email").value;
        var error = document.querySelector(".errorm");

        if (fname === "" || lname === "" || email === "") {
            error.innerHTML = "Please enter all necessary details.";
            return false;
        }
        flen = fname.length;
        llen = lname.length;

        if (flen > 10 || llen > 10) {
            error.innerHTML = "Name cannot be longer than 10 letters.";
            return false;
        }

        var nameRegex = /^[A-Za-z]+$/;
        if (!nameRegex.test(fname) || !nameRegex.test(lname)) {
            error.innerHTML = "First name and last name cannot contain numbers.";
            return false;
        }
        var emailRegex = /^([a-zA-Z0-9\._]+)@([a-zA-Z]+)(\.[a-zA-Z]+)+$/;

        if (!emailRegex.test(email)) {
            error.innerHTML = "Please enter a valid email address.";
            return false;
        }

        return true;
    }
    </script>
</body>

</html>