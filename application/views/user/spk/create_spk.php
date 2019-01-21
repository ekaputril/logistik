<?php $this->load->view('user/layouts/header') ?>

<div class="container">
<?php echo form_open() ?>
<input class="form-control" type="text" name="search" value="" placeholder="Search...">
<input type="submit" class="btn btn-primary" href="<?php echo site_url('create_spk/search') ?>" value="Go">
<?php echo form_close() ?>
  <legend>Data Jadwal</legend>
  <a class="glyphicon glyphicon-print" href="<?php echo site_url('Reporting/print/'.$this->input->post("search")) ?>">
    Print jadwal
  </a>