<ul id="reportInfo">
	<li class="title">Sudarytų sutarčių ataskaita</li>
	<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
	<li>Sutarčių sudarymo laikotarpis:
		<span>
		<?php
			if(!empty($data['dateFrom'])) {
				if(!empty($data['dataTill'])) {
					echo "nuo {$data['dateFrom']} iki {$data['dateTill']}";
				} else {
					echo "nuo {$data['dateFrom']}";
				}
			} else {
				if(!empty($data['dateTill'])) {
					echo "iki {$data['dateTill']}";
				} else {
					echo "nenurodyta";
				}
			}
		?>
		</span>
	</li>
</ul>
<?php
	if(sizeof($contractData) > 0) { ?>
		<table class="table">
			<thead>	
				<tr>
					<th>Skaitytojas</th>
					<th>Paėmimo data</th>
					<th>Knyga</th>
					<th>Grąžinimo data</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$contractCount = -1;
					// suformuojame lentelę
					for($i = 0; $i < sizeof($contractData); $i++) {
						
						if($i == 0 || $contractData[$i]['skaitytojas'] != $contractData[$i-1]['skaitytojas']) {
							echo
								"<tr class='table-primary'>"
									. "<td colspan='4'>{$contractData[$i]['skaitytojas']}</td>"
								. "</tr>";
						}
						
						// if($contractData[$i]['isdavimo_data'] == 0) {
						// 	$contractData[$i]['sutarties_paslaugu_kaina'] = "neužsakyta";
						// } else {
						// 	$contractData[$i]['sutarties_paslaugu_kaina'] .= " &euro;";
						// }
						echo
							"<tr>"
								. "<td>#{$contractData[$i]['nr']}</td>"
								. "<td>{$contractData[$i]['isdavimo_data']}</td>"
								. "<td>{$contractData[$i]['knyga']}</td>"
								. "<td>{$contractData[$i]['grazinimo_data']}</td>"
							. "</tr>";
							echo 
							"<tr>"
								. "<td><b>Sutarties dienų skaičius:</b></td>"
								. "<td>{$contractData[$i]['datedif']} days</td>"
								. "<td></td>"
								. "<td></td>"
							. "</tr>";
						if($i == (sizeof($contractData) - 1) || $contractData[$i]['skaitytojas'] != $contractData[$i+1]['skaitytojas']) {
							echo 
							"<tr>"
								. "<td><b>Iš viso vienam skaitytojui:</b></td>"
								. "<td>{$contractData[$i]['suma']} dienos</td>"
								. "<td>{$contractData[$i]['kiekis']} knyga(-os)</td>"
								. "<td></td>"
							. "</tr>";
						}
						$contractCount+=1;
					}
				?>
				<tr>
					<td></td>
				</tr>
				
				<tr>
					<td colspan='3'><b>Iš viso sutarčių:</b></td>
					<td colspan='1'><?php echo $countOfContracts[0]['kiekis'] ?></td>
				</tr>

				<tr>
					<td colspan='3'><b>Maksimalus dienų skaičius vienai sutarčiai:</b></td>
					<td colspan='1'><?php echo $maxCount[0]['kiekis'] ?></td>
				</tr>
				
				
			</tbody>
		</table>
		<a href="index.php?module=contract&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">Nauja ataskaita</a>
<?php   
	} else {
?>
		<div class="warningBox">
			Nurodytu laikotartpiu sutarčių sudaryta nebuvo.
		</div>
<?php
	}
?>