<div id="content">
    <div class="add_admin">
        <div class="title_add_admin">
            <a href="#">
                update admin
            </a>
        </div>
        <div class="isi_add_admin">
            <?php echo  form_open_multipart("adminweb/c_admin/update_admin/");?>
                <table>
                    <input type="hidden" name="idx" value="<?php echo $dt->id; ?>">
                    <tr>
                        <td width="70px">Nama</td>
                        <td>:</td>
                        <td><input type="text" name="nama" id="nama" size="30" value="<?php echo $dt->nama; ?>" required /></td>
                    </tr>
                    <tr>
                        <td width="70px">Username</td>
                        <td>:</td>
                        <td><input type="text" name="username" id="username" value="<?php echo $dt->username; ?>" size="30" required /></td>
                    </tr>
                    <tr>
                        <td width="70px">Password</td>
                        <td>:</td>
                        <td><input type="password" name="password" id="password" value="<?php echo $dt->password; ?>" size="30" required /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input class="tombol" type="submit" name="simapn" value="Rubah" /></td>
                    </tr>
                </table>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>