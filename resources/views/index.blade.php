<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="utf-8">
 <title>グラフ</title> 
</head>
 <body>
		<h1>グラフ</h1>
   	<canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	<!-- グラフを描画 -->
   <script>
		 "use strict";

	//ラベル
	var labels = [
		"2020年1月",
		"2020年2月",
		"2020年3月",
		"2020年4月",
		"2020年5月",
		"2020年6月",
	];
	//平均体重ログ
	var average_weight_log = [
		50.0,	//1月のデータ
		51.0,	//2月のデータ
		52.0,	//3月のデータ
		53.0,	//4月のデータ
		54.0,	//5月のデータ
		49.0	//6月のデータ
	];
	//最大体重ログ
	var max_weight_log = [
		52.0,	//1月のデータ
		54.0,	//2月のデータ
		55.0,	//3月のデータ
		51.0,	//4月のデータ
		57.0,	//5月のデータ
		48.0	//6月のデータ
	];
	//最小体重ログ
	var min_weight_log = [
		48.0,	//1月のデータ
		47.0,	//2月のデータ
		45.0,	//3月のデータ
		44.0,	//4月のデータ
		43.0,	//5月のデータ
		49.0	//6月のデータ
	];

	//グラフを描画
   var ctx = document.getElementById("myChart");
   var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels,
			datasets: [
				{
					label: '平均体重',
					data: average_weight_log,
					borderColor: "rgba(0,0,255,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				{
					label: '最大',
					data: max_weight_log,
					borderColor: "rgba(0,255,0,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				},
				{
					label: '最小',
					data: min_weight_log,
					borderColor: "rgba(255,0,0,1)",
         			backgroundColor: "rgba(0,0,0,0)"
				}
			]
		},
		options: {
			title: {
				display: true,
				text: '体重ログ（６ヶ月平均）'
			}
		}
   });
   </script>
   <!-- グラフを描画ここまで -->
 </body>
</html>