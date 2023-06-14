<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	table, th, td {
      border: 1px solid white;
      border-collapse: collapse;
    }
    th, td {
      background-color: lightgray;
    }
	</style>
	<script language="JavaScript" type="text/javascript">
		function checkDelete(){
    	return confirm('Are you sure?');
		}
	</script>

</head>
<body>
<h1>Test untuk Fast Print Junior Grade Program Developer</h1>
<div id="container">
	<h1>Manajemen Produk</h1>

  
	<div id="body">
		<div id="form">
		<?php echo validation_errors(); ?>
    	<form action="<?php echo base_url("welcome/fungsitambah") ?>" method="post">
    		<table >
    			<tr>
    			<td>
    				<input type="text" name="id" id="id">
    			</td>
    			</tr>
    			<tr>
    				<td><label>Nama Produk</label></td>
    				<td><input type="text" name="nmp" id="nmp"></td>
    			</tr>
    			<tr>
    				<td><label>Harga Produk</label></td>
    				<td><input type="text" name="hrg" id="hrg"></td>
    			</tr>
    			<tr>
    				<td><label>Kategori Produk</label></td>
    				<td><input type="text" name="kat" id="kat"></td>
    			</tr>
    			<tr>
    				<td><label>Status Produk</label></td>
    				<td>
    					<input type="radio" name="stat" id="tidak" value="tidak"/>
                        <label for="contact_email">Tidak Dijual</label>

                        <input type="radio" name="stat" id="bisa" value="bisa"/>
                        <label for="contact_phone">Bisa Dijual</label>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<button type="submit" name="pilihan" value="tambah"> Tambah</button>
    				</td>
    			    <td>
    			    	<button type="submit" name="pilihan" value="edit"> Edit</button>
    			    </td>
    			</tr>
    		</table>
        </form>
 	    </div>
 	    <br>
 	    <form action="<?php echo base_url("welcome/fungsiganti") ?>" method="post">
 	    	<tr>
    			<td>
    				<button type="submit" name="pilihan2" value="con1"> Hanya Termasuk Yang Bisa Dijual</button>
    			</td>
    		    <td>
    			    <button type="submit" name="pilihan2" value="con2"> Hanya Termasuk Yang Tidak Dijual</button>
   			    </td>
   			    <td>
   			    	<button type="submit" name="pilihan2" value="con3"> Termasuk Semuanya</button>
   			    </td>
    		</tr>
 	    </form>
		<table id="prod">
			<tr>
				<td>Id</td>
				<td>Nama</td>
				<td>Harga</td>
				<td>Kategori</td>
				<td>Status</td>
			</tr>
			<?php foreach($queryPrd as $row){ ?>
			<tr>
				<td id="td1"><?php echo $row->id_produk?></td>
				<td id="td2"><?php echo $row->nama_produk?></td>
				<td id="td3"><?php echo $row->harga?></td>
				<td id="td4"><?php echo $row->kategori?></td>
				<td id="td5"><?php echo $row->status?></td>
				<td><button onclick="getall()" class="btnEdit">Edit</button><br><a href="<?php echo base_url('welcome/fungsihapus') ?>/<?php echo $row->id_produk ?>" onclick="return confirm('Apakah anda yakin akan menghapus produk?)" class="button">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
		<br>
	</div>
</div>
<script text="text/javascript">
function getall(){
	document.getElementById("id").value = document.getElementById('td1').innerText; 
	document.getElementById("nmp").value = document.getElementById('td2').innerText; 
	document.getElementById("hrg").value = document.getElementById('td3').innerText; 
	document.getElementById("kat").value = document.getElementById('td4').innerText; 
	var a = document.getElementById('td5').innerText; 
	if (a == "bisa"){
	   const bisaBtn = document.getElementById('bisa');
	   bisaBtn.checked = true;

       const tidakBtn = document.getElementById('tidak');
       tidakBtn.checked = false;
	}
	else
	{
	const bisaBtn = document.getElementById('bisa');
	   bisaBtn.checked = false;

       const tidakBtn = document.getElementById('tidak');
       tidakBtn.checked = true;
	}
}
</script>
</body>
</html>
