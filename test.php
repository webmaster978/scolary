

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Invoice - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>
<body onload="window.print(); window.close();">




<div class="col-md-12">
<div class="row">
<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
<div class="row">
<div class="receipt-header">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="receipt-left">
<img class="img-responsive" alt="iamgurdeeposahan" src="img/avatar.png" style="width: 71px; border-radius: 43px;">
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 text-right">
<div class="receipt-right">
<h5>INSTITUT INJILI</h5>
<p>BP 376 GOMA<i class="fa fa-phone"></i></p>
<p><a href="#" class="#" data-cfemail="#">injili@gmail.com</a> <i class="fa fa-envelope-o"></i></p>
<p>Goma <i class="fa fa-location-arrow"></i></p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="receipt-header receipt-header-mid">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<h5> Jeremie</h5>
<p><b>Annee scolaire :</b> 2021-2022</p>
<p><b>Classe :</b> <a href="#">2 eme Commerciale</a></p>

</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">
<h3> Recu numero 4 </h3>
</div>
</div>
</div>
</div>
<div>
<table class="table table-bordered">
<thead>
<tr>
<th>Description</th>
<th>Montant</th>
</tr>
</thead>
<tbody>
<tr>
<td class="col-md-9">Frais d'inscription</td>
<td class="col-md-3"><i class="fa fa-inr"></i> 5 $</td>
</tr>

<tr>
<td class="text-right">
<p>
<strong>Total: </strong>
</p>
<p>
<strong>Reste a payer: </strong>
</p>

</td>
<td>
<p>
<strong><i class="fa fa-inr"></i>5 $</strong>
</p>
<p>
<strong><i class="fa fa-inr"></i>0 $</strong>
</p>

</td>
</tr>
<tr>
<td class="text-right"><h2><strong>Total: </strong></h2></td>
<td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 5 $</strong></h2></td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="receipt-header receipt-header-mid receipt-footer">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<p><b>Date :</b> 2023-10-15 15:18:57</p>
<h5 style="color: rgb(140, 140, 140);">INSTITUT INJILI!</h5>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">
<h1>Stamp</h1>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>