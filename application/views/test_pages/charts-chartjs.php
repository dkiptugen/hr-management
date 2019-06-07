<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Chart.js</h1>

		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<h5 class="card-title">Line Chart</h5>
						<h6 class="card-subtitle text-muted">A line chart is a way of plotting data points on a line.</h6>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="chartjs-line"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Line chart
						new Chart(document.getElementById("chartjs-line"), {
							type: 'line',
							data: {
								labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
								datasets: [{
									label: "Sales ($)",
									fill: true,
									backgroundColor: "transparent",
									borderColor: "#2979ff",
									data: [2115, 1562, 1584, 1892, 1487, 2223, 2966, 2448, 2905, 3838, 2917, 3327]
								}, {
									label: "Orders",
									fill: true,
									backgroundColor: "transparent",
									borderColor: "#E8EAED",
									borderDash: [4, 4],
									data: [958, 724, 629, 883, 915, 1214, 1476, 1212, 1554, 2128, 1466, 1827]
								}]
							},
							options: {
								maintainAspectRatio: false,
								legend: {
									display: false
								},
								tooltips: {
									intersect: false
								},
								hover: {
									intersect: true
								},
								plugins: {
									filler: {
										propagate: false
									}
								},
								scales: {
									xAxes: [{
										reverse: true,
										gridLines: {
											color: "rgba(0,0,0,0.05)"
										}
									}],
									yAxes: [{
										ticks: {
											stepSize: 500
										},
										display: true,
										borderDash: [5, 5],
										gridLines: {
											color: "rgba(0,0,0,0)",
											fontColor: "#fff"
										}
									}]
								}
							}
						});
					});
				</script>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Bar Chart</h5>
						<h6 class="card-subtitle text-muted">A bar chart provides a way of showing data values represented as vertical bars.</h6>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="chartjs-bar"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Bar chart
						new Chart(document.getElementById("chartjs-bar"), {
							type: 'bar',
							data: {
								labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
								datasets: [{
									label: "Last year",
									backgroundColor: "#2979ff",
									borderColor: "#2979ff",
									hoverBackgroundColor: "#2979ff",
									hoverBorderColor: "#2979ff",
									data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79]
								}, {
									label: "This year",
									backgroundColor: "#E8EAED",
									borderColor: "#E8EAED",
									hoverBackgroundColor: "#E8EAED",
									hoverBorderColor: "#E8EAED",
									data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68]
								}]
							},
							options: {
								maintainAspectRatio: false,
								legend: {
									display: false
								},
								scales: {
									yAxes: [{
										gridLines: {
											display: false
										},
										stacked: false,
										ticks: {
											stepSize: 20
										}
									}],
									xAxes: [{
										barPercentage: .75,
										categoryPercentage: .5,
										stacked: false,
										gridLines: {
											color: "transparent"
										}
									}]
								}
							}
						});
					});
				</script>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Doughnut Chart</h5>
						<h6 class="card-subtitle text-muted">Doughnut charts are excellent at showing the relational proportions between data.</h6>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-doughnut"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Doughnut chart
						new Chart(document.getElementById("chartjs-doughnut"), {
							type: 'doughnut',
							data: {
								labels: ["Social", "Search Engines", "Direct", "Other"],
								datasets: [{
									data: [260, 125, 54, 146],
									backgroundColor: ["#2979ff", "#ff9100", "#00c853", "#E8EAED"],
									borderColor: "transparent"
								}]
							},
							options: {
								maintainAspectRatio: false,
								cutoutPercentage: 65,
								legend: {
									display: false
								}
							}
						});
					});
				</script>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Pie Chart</h5>
						<h6 class="card-subtitle text-muted">Pie charts are excellent at showing the relational proportions between data.</h6>
					</div>
					<div class="card-body">
						<div class="chart chart-sm">
							<canvas id="chartjs-pie"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Pie chart
						new Chart(document.getElementById("chartjs-pie"), {
							type: 'pie',
							data: {
								labels: ["Social", "Search Engines", "Direct", "Other"],
								datasets: [{
									data: [260, 125, 54, 146],
									backgroundColor: ["#2979ff", "#ff9100", "#00c853", "#E8EAED"],
									borderColor: "transparent"
								}]
							},
							options: {
								maintainAspectRatio: false,
								legend: {
									display: false
								}
							}
						});
					});
				</script>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Radar Chart</h5>
						<h6 class="card-subtitle text-muted">A radar chart is a way of showing multiple data points and the variation between them.</h6>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="chartjs-radar"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Radar chart
						new Chart(document.getElementById("chartjs-radar"), {
							type: 'radar',
							data: {
								labels: ["Speed", "Reliability", "Comfort", "Safety", "Efficiency"],
								datasets: [{
									label: "Model X",
									backgroundColor: "rgba(0, 123, 255, 0.2)",
									borderColor: "#2979ff",
									pointBackgroundColor: "#2979ff",
									pointBorderColor: "#fff",
									pointHoverBackgroundColor: "#fff",
									pointHoverBorderColor: "#2979ff",
									data: [70, 53, 82, 60, 33]
								}, {
									label: "Model S",
									backgroundColor: "rgba(220, 53, 69, 0.2)",
									borderColor: "#ff9100",
									pointBackgroundColor: "#ff9100",
									pointBorderColor: "#fff",
									pointHoverBackgroundColor: "#fff",
									pointHoverBorderColor: "#ff9100",
									data: [35, 38, 65, 85, 84]
								}]
							},
							options: {
								maintainAspectRatio: false
							}
						});
					});
				</script>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Polar Area Chart</h5>
						<h6 class="card-subtitle text-muted">Polar area charts are similar to pie charts, but each segment has the same angle.</h6>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="chartjs-polar-area"></canvas>
						</div>
					</div>
				</div>

				<script>
					document.addEventListener("DOMContentLoaded", function(event) {
						// Polar Area chart
						new Chart(document.getElementById("chartjs-polar-area"), {
							type: 'polarArea',
							data: {
								labels: ["Speed", "Reliability", "Comfort", "Safety", "Efficiency"],
								datasets: [{
									label: "Model S",
									data: [35, 38, 65, 70, 24],
									backgroundColor: ["#2979ff", "#00c853", "#ff9100", "#ff1744", "#E8EAED"],
								}]
							},
							options: {
								maintainAspectRatio: false
							}
						});
					});
				</script>
			</div>
		</div>

	</div>
</main>