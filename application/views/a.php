<table class="tabel_register">
    <tr>
        <td class="jenis_name">Username</td>
        <td class="input_name"><input type="text" name="name" id="name" placeholder="Username" class="input_text" required /></td>
    </tr>
    <tr>
        <td class="jenis_name">Fullname</td>
        <td class="input_name"><input type="text" name="fullname" id="fullname" placeholder="Fullname" class="input_text" required /></td>
    </tr>
    <tr>
        <td class="jenis_name">Email</td>
        <td class="input_name"><input type="email" name="email" id="email" placeholder="Email" class="input_text" required /></td>
    </tr>
    <tr>
        <td class="jenis_name">Password</td>
        <td class="input_name"><input type="password" name="password" id="password" placeholder="Password" class="input_text" required></td>
    </tr>
    <tr>
        <td class="jenis_name">Confirm Password</td>
        <td class="input_name"><input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" class="input_text" required></td>
    </tr>
    <tr>
        <td class="jenis_name"></td>
        <td class="input_name">

            <?php echo $this->recaptcha->render(); ?>

        </td>
    </tr>
    <tr>
        <td class="jenis_name"></td>
        <td class="input_name">
            <input class="submit" id="submit_button" type="submit" value="Register">
            <input class="cancel" id="reset_button" type="reset" value="Reset">
        </td>
    </tr>
</table>

<p><label style="width: 25%">nama</label>
    <input style="width: 70%;" type="text" name="name" id="name" placeholder="Username" class="input_text" required />
</p>
<label>alamats</label>
<input type="text" name="fullname" id="fullname" placeholder="Fullname" class="input_text" required />
<?php echo $this->recaptcha->render(); ?>