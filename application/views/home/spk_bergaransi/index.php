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
                            <th>Syarat Pembayaran</th>
                            <th>Pembuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php foreach($SpkG as $item) { ?>
                        <tr>
                            <td><?php echo ++$i; ?></td>
                            <td><?php echo $item['perihal']; ?></td>
                            <td><?php echo $item['no_surat']; ?></td>
                            <td><?php echo $item['tgl_surat']; ?></td>
                            <td><?php echo $item['tgl_mulai']; ?> s/d <?php echo $item['tgl_selesai']; ?></td>
                            <td><?php echo $item['persen']; ?></td>
                            <td><?php echo $item['username']; ?></td>
                            <td>
                                <button class="btn btn-danger" type="button" onclick="deleteSPK('<?php echo $item['id_surat']; ?>')"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable();

        deleteSPK = function(idTutorial) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data surat ini?');

            if(confirmation) {
                document.location.href = '<?php echo base_url(); ?>SPK_bergaransi/delete/' + id_surat;
            } else {
                // No aksi
            }
        }

		// openModalTutorial = function(content) {
		// 	$('#modalTutorial').modal('show');
		// 	document.getElementById('stepTutorial').innerHTML = content;
		// }
      });
    </script>
        <?php $this->load->view('home/layouts/base_end') ?>