<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nieuwsbrief</title>
</head>
<body>
    <article class="article">
        <h1 class="newsletter">API</h1>
        <form class="form" method="POST" action="save_data.php" onsubmit="return validateForm()">

            <select name="nieuwsbrief" id="nieuwsbrief">
                <option value="newsletter">Nieuwsbrief</option>
                <option value="reviewmail">Reviewmail</option>
            </select>
            <input class="input" type="text" name="fname" placeholder="*First name">
            <input class="input" type="text" name="lname" placeholder="*Last name">
            <input class="input" type="email" name="email" placeholder="*Email">
            <input class="submit" type="submit">
        </form>

        <script>
            function validateForm() {
                var email = document.querySelector("input[name='email']").value;
                var nieuwsbrief = document.querySelector("select[name='nieuwsbrief']").value;

                if (email === "" || nieuwsbrief === "") {
                    alert("Please fill in all fields.");
                    return false;
                }
                return true;
            }
        </script>
    </article>
</body>
</html>
