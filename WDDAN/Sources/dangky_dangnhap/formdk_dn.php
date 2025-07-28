		<div id="background" style="background: rgba(255,255,255,0.3); width: 100%; height: 100%; position: fixed; top: 0px; display: none;">
			<div class="login">
				<h2>Login</h2>
				<form method="post" action="dangky_dangnhap/xulydangnhap.php">
				<div class="inputbox">
					<input type="text" name="txtUsername" id="us" required="" autocomplete="off">
					<label>Username</label>
				</div>
				<div class="inputbox">
					<input type="password" name="txtPassword" id="pa" required="" autocomplete="off">
					<label>Password</label>
				</div>
					<input type="submit" value="Submit" name="dangnhap" id="clickme">
				</form>
				<i class="fa fa-window-close close"></i>
			</div>
			<div class="login">
				<h2>Sign Up</h2>
				<form method="post" action="dangky_dangnhap/xulydangky.php">
					<div class="inputbox">
						<input type="text" name="txtUsername" required="" autocomplete="off">
						<label>Username</label>
					</div>
					<div class="inputbox">
						<input type="text" name="txtEmail" required="" autocomplete="off">
						<label>E mail</label>
					</div>
					<div class="inputbox">
						<input type="password" name="txtPassword" required="" autocomplete="off">
						<label>Password</label>
					</div>
					<div class="inputbox">
						<input type="password" name="txtPassword2" required="" autocomplete="off">
						<label>Confirm Password</label>
					</div>
					<input type="submit" value="Submit" name="ok">
				</form>
				<i class="fa fa-window-close close"></i>
			</div>
		</div>