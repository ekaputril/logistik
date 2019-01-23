<?php $this->load->view('home/layouts/base_start') ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Surat:</h6>
            <a class="dropdown-item" href="<?php echo site_url('/SPK_bergaransi');?>">SPK Dengan Garansi</a>
            <a class="dropdown-item" href="<?php echo site_url('/SPK');?>">SPK Tanpa Garansi</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('laporan');?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('transaksi');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Surat Perintah Kerja Dengan Garansi</li>
          </ol>

          <!-- Icon Cards-->
          <div class="card">
            <div class="card-body">
            <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Perihal</th>
                            <th>Nomor Surat</th>
                            <th>Tgl Surat</th>
                            <th>Jangka Waktu</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Syarat Pembayaran</th>
                            <th>Pembuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($SpkG as $item) { ?>
                            <?php
							$surat = $this->db->where('id_surat', $item['id_surat']);	
							$surat = $this->db->get('tbl_spk');
							$result1 = $surat->result_array();

							$content = "";

                            if(count($result1) > 0) {
                                foreach($result1 as $surat) {
                                    $content .= "<p>" . $surat['perihal'] . "</p>";
                                }
                            } else {
                                $content .= "<p>Tidak ada isi surat.</p>";
                            }
						    ?>
                        <tr>
                            <td><?php echo $item['id_surat']; ?></td>
                            <td><?php echo $item['perihal']; ?></td>
                            <td><?php echo $item['no_surat']; ?></td>
                            <td><?php echo $item['tgl_surat']; ?></td>
                            <td><?php echo $item['tgl_mulai']; ?> s/d <?php echo $item['tgl_selesai']; ?></td>
                            <td><?php echo $item['harga']; ?></td>
                            <td><?php echo $item['keterangan']; ?></td>
                            <td><?php echo $item['persen']; ?></td>
                            <td><?php echo $item['username']; ?></td>
                            <td>
                            <button type="button" class="btn btn-info" onclick="openModalUpdate('<?php echo $item['id_surat']; ?>', '<?php echo $item['perihal']; ?>','<?php echo $item['no_surat']; ?>', '<?php echo $item['tgl_surat']; ?>', '<?php echo $item['harga']; ?>', '<?php echo $item['tgl_mulai']; ?>', '<?php echo $item['tgl_selesai']; ?>', '<?php echo $item['keterangan']; ?>', '<?php echo $item['id_syarat']; ?>')">
						    <span class="fa fa-edit"></span></button>
                            <button class="btn btn-primary" type="button" onclick="openModalLihatSPK('<?php echo $content; ?>')"><i class="fas fa-folder-open"></i></button>
                                <a href="<?php echo site_url()?>/SPK/delete/<?php echo $item['id_surat']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data permanently?'); ">
						        <span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <!-- Edit Surat -->
      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade-in">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Data Surat</h4>
                  </div>
                    <?php echo form_open_multipart('SPK/update'); ?>
                    <div class="modal-body">
                <div class="container-fluid">
                            <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Perihal</label>
                                <div class="col-lg-12">
                                        <input type="hidden" id="id_surat" name="id_surat">
                                    <input type="text" class="form-control" id="editPerihal" name="editPerihal" placeholder="Masukkan perihal" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Nomor Surat</label>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" id="editNomor" name="editNomor" placeholder="Masukkan nomor surat" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Tanggal Surat</label>
                                <div class="col-lg-12">
                                    <input id="editTglSurat" type="text" name="editTglSurat" class="datepicker" placeholder="Masukkan tanggal surat" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Harga</label>
                                <div class="col-lg-12">
                                    <input id="editHarga" type="text" name="editHarga" class="form-control" placeholder="Masukkan harga" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Tanggal Mulai</label>
                                <div class="col-lg-12">
                                    <input id="editTglMulai" type="text" name="editTglMulai" class="datepicker" placeholder="Masukkan tanggal mulai" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Tanggal Selesai</label>
                                <div class="col-lg-12">
                                    <input id="editTglSelesai" type="text" name="editTglSelesai" class="datepicker" placeholder="Masukkan tanggal selesai" required>
                                </div>
                            </div>
                  <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Syarat Pembayaran</label>
                                <div class="col-lg-12">
                                  <select name="id_syarat" class="form-control">
                        <option id="edit100" value="1">100%</option>
                        <option id="edit92" value="2">92.5% & 7.5%</option>
                      </select>
                                </div>
                            </div>
                                <div class="form-group">
                                <label class="col-lg-4 col-sm-4 control-label">Keterangan</label>
                                <div class="col-lg-12">
                                    <input id="editKeterangan" type="text" name="editKeterangan" class="form-control" placeholder="Masukkan keterangan" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit"> Save&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                        </div>
                      <?php echo form_close();?>
                  </div>
              </div>
          </div>
      </div>

        <!-- Modal Lihat Surat -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalLihatSPK" class="modal fade-in">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Data Surat</h4>
                  </div>
            <div class="modal-body" id="surat"></div>
              </div>
          </div>
      </div>
        <?php $this->load->view('home/layouts/base_end') ?>
        <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();

        deleteSPK = function(id_surat) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data surat ini?');

            if(confirmation) {
                document.location.href = '<?php echo base_url(); ?>SPK_bergaransi/delete/' + id_surat;
            } else {
                // No aksi
            }
        }
        openModalUpdate = function(id_surat, perihal, no_surat, tgl_surat,harga,tgl_mulai,tgl_selesai,keterangan,id_syarat) {
			$('#edit-data').modal('show');
            $('#id_surat').val(id_surat);			
            $('#editPerihal').val(perihal);
			$('#editNomor').val(no_surat);
            $('#editTglSurat').val(tgl_surat);
            $('#editHarga').val(harga);
            $('#editTglMulai').val(tgl_mulai);
            $('#editTglSelesai').val(tgl_selesai);
            $('#editKeterangan').val(keterangan);

			if( id_syarat == '1') {
				$('#edit100').attr('selected', 'selected');
			} else {
				$('#edit92').attr('selected', 'selected');
			}
		}

		openModalLihatSPK = function(content) {
			$('#modalLihatSPK').modal('show');
			document.getElementById('surat').innerHTML = content;
		}
      });
    </script>