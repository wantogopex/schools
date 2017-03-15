<div id="content">
    <div class="content_admin">
        <div class="add_admin">
            <div class="title_add_admin">
                <a class="main_title_add_admin">
                    tambah berita
                </a>
            </div>
            <div class="isi_add_admin">

                <form enctype="multipart/form-data" method="post" action="<?= base_url() . '/adminweb/c_berita_terbaru/do_upload'; ?>"  novalidate>
                    <table>
                        <tr>
                            <td class="title_table">Judul berita</td>
                            <td class="isi_table"><input type="text" name="judul_berita" id="judul_berita" class="input_text" required /></td>
                        </tr>
                        <tr>
                            <td class="title_table">isi berita</td>
                            <td class="isi_table">
                                <textarea name="isi_berita" class="input_area" required></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title_table">Gambar</td>
                            <td class="isi_table"><input class="input_text" type="file" name="filefoto" required /></td>
                        </tr>
                        <tr>
                            <td class="isi_table" colspan="2" style="border-spacing: 0;">
                                <input class="simpan" type="submit" name="simpan" value="Simpan" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="tampil_admin">
            <table class="tbl_admin">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Berita</th>
                        <th>Isi Berita</th>
                        <th>gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($berita)) { ?> <!-- jika data kosong kita tampilkan pesan -->
                    <tr>
                        <td colspan="7">Data tidak ada cuy</td>
                    </tr>
                    <?php
                } else {
                    $i = 0;
                    foreach ($berita as $rowdata) {
                        $i++;
                        ?> <!-- menampilkan data dari query dengan looping -->
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rowdata->judul_berita; ?></td>
                            <td><?php echo $rowdata->isi_berita; ?></td>
                            <td class="td_img"><img src='/asset/uploads/berita_baru/<?php echo $rowdata->img_berita; ?> '></td>
                            <td>
                                <a><?php echo anchor('adminweb/c_berita_terbaru/edit/' . $rowdata->id_berita, "Edit"); ?></a> |
                                <a><?php echo anchor('adminweb/c_berita_terbaru/proses_hapus/' . $rowdata->id_berita, "Delete"); ?></a>
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