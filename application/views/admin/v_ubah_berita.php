<div id="content">
    <div class="content_admin">
        <div class="update_admin">
            <div class="title_update_admin">
                <a class="main_title_update_admin">
                    update berita
                </a>
            </div>
            <div class="isi_update_admin">
                <?php echo  form_open_multipart("adminweb/c_berita_terbaru/update");?>
                    <table>
                        <tr>
                            <td>
                                <input type="hidden" class="input_area" name="id_berita" value="<?php echo $r->id_berita ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" class="input_area" name="path" value="<?php echo $r->img_berita ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="title_table">Judul berita</td>
                            <td class="isi_table"><input type="text" name="judul_berita" id="judul_berita" value="<?php echo $r->judul_berita ?>"  class="input_text" required /></td>
                        </tr>
                        <tr>
                            <td class="title_table">isi berita</td>
                            <td class="isi_table" style="">
                            <textarea id="isi_berita" name="isi_berita" class="input_area" ><?php echo $r->isi_berita ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="title_table">Gambar</td>
                            <td class="isi_table"><img style="widt: 150px; height: 150px;" src="<?php echo base_url('asset/uploads/berita_baru/' . $r->img_berita); ?>" /></td>
                        </tr>
                        <tr>
                            <td class="title_table">Pilih Gambar</td>
                            <td class="isi_table"><input class="input_text" type="file" name="filefoto" /></td>
                        </tr>
                        <tr>
                            <td class="isi_table" colspan="2" style="border-spacing: 0;">
                                <input class="simpan" type="submit" name="simpan" value="rubah" />
                            </td>
                        </tr>
                    </table>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>