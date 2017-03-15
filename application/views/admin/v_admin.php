<div id="content">
    <div class="content_admin">
        <div class="add_admin">
            <div class="title_add_admin">
                <a class="main_title_add_admin">
                    tambah admin
                </a>
            </div>
            <div class="isi_add_admin">
                <?php echo  form_open_multipart("adminweb/c_admin/tambah_admin");?>
                    <table>
                        <tr>
                            <td class="title_table">Nama</td>
                            <td class="isi_table"><input type="text" name="nama" id="nama" class="input_text" required /></td>
                        </tr>
                        <tr>
                            <td class="title_table">Username</td>
                            <td class="isi_table"><input type="text" name="username" id="username" class="input_text" required /></td>
                        </tr>
                        <tr>
                            <td class="title_table">Password</td>
                            <td class="isi_table"><input type="password" name="password" id="password" class="input_text" required /></td>
                        </tr>
                        <tr>
                            <td class="isi_table" colspan="2" style="border-spacing: 0;">
                                <input class="simpan" type="submit" name="simpan" value="Simpan" />
                            </td>
                        </tr>
                    </table>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="tampil_admin">
            <table class="tbl_admin">
                <thead>
                        <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                        </tr>
                </thead>
                <tbody>
                    <?php if (empty($admin)) { ?> <!-- jika data kosong kita tampilkan pesan -->
                                <tr>
                                    <td colspan="7">Data tidak ada cuy</td>
                                </tr>
                                <?php
                            } else {
                                $i = 0;
                                foreach ($admin as $rowdata) {
                                    $i++;
                                    ?> <!-- menampilkan data dari query dengan looping -->
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rowdata->nama; ?></td>
                                    <td><?php echo $rowdata->username; ?></td>
                                    <td><?php echo $rowdata->password; ?></td>
                                    <td>
                                        <a><?php echo anchor('adminweb/c_admin/update_admin/'.$rowdata->id,"Edit");?></a> |
                                        <a><?php echo anchor('adminweb/c_admin/hapus/'.$rowdata->id,"Delete");?></a>
                                    </td>
                                </tr>
                        <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>