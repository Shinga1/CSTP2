<head>
	<title>Login Page</title>
</head>

<body>
	<h2>Login Page</h2>
	<?php
		// define variables and set to empty values
		$username = $password = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$username = test_input($_POST["username"]);
			$password = test_input($_POST["password"]);

			// checks if username and password are valid
			if ($username == "myusername" && $password == "mypassword") {
				// start a session and redirect to home page
				session_start();
				$_SESSION["username"] = $username;
				header("Location: home.blade.php");
			} else {
				// show an error message
				echo "<p style='color:red'>Invalid username or password</p>";
			}
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label  for="username">Username:</label>
		<input  type="text" name="username" id="username" required><br><br>
		<label  for="password">Password:</label>
		<input  type="password"  name="password" id="password" required><br><br>
		<input  type="submit"  value="Login">
	</form>

</body>