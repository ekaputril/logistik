<html>
<head>
<title>Print</title>
<style type="text/css">

table{
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
}

table th
{
    border:1px solid #000;
    padding: 3px;
    font-weight: bold;
    text-align: center;
}

table td
{
    border:1px solid #000;
    padding: 3px;
    vertical-align: top;
}

</style>
</head>
<body>
<h2><center>Print</center></h2>
<table>
<thead>
<tr>
<th>Id</th>
<th>Mata Kuliah</th>
<th>Dosen</th>
<th>Hari</th>
<th>Jumlah Jam</th>
<th>Nama Ruang</th>
</tr>
</thead>

<tbody>
<?php $no=1;
foreach ($reporting as $key) { ?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $key->mata_kuliah ?></td>
<td><?php echo $key->dosen ?></td>
<td><?php echo $key->hari  ?></td>
<td><?php echo $key->jam  ?></td>
<td><?php echo $key->nama_ruang  ?></td>
</tr>

<?php $no++; }
?>

</tbody>
</table>
</body>
</html>