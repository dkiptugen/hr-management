
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Advanced Elements</h1>

		<div class="row">
			<div class="col-12 col-lg-5 col-xxl-6 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Select2</h5>
						<h6 class="card-subtitle text-muted">The jQuery replacement for select boxes.</h6>
					</div>
					<div class="card-body">
						<div class="mb-3">
							<select class="form-control select2" data-toggle="select2">
<optgroup label="Alaskan/Hawaiian Time Zone">
  <option value="AK">Alaska</option>
  <option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
  <option value="CA">California</option>
  <option value="NV">Nevada</option>
  <option value="OR">Oregon</option>
  <option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
  <option value="AZ">Arizona</option>
  <option value="CO">Colorado</option>
  <option value="ID">Idaho</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NM">New Mexico</option>
  <option value="ND">North Dakota</option>
  <option value="UT">Utah</option>
  <option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
  <option value="AL">Alabama</option>
  <option value="AR">Arkansas</option>
  <option value="IL">Illinois</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="OK">Oklahoma</option>
  <option value="SD">South Dakota</option>
  <option value="TX">Texas</option>
  <option value="TN">Tennessee</option>
  <option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="IN">Indiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="OH">Ohio</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WV">West Virginia</option>
</optgroup>
</select>
						</div>

						<div class="mb-3">
							<select class="form-control select2" data-toggle="select2" multiple>
<optgroup label="Alaskan/Hawaiian Time Zone">
  <option value="AK">Alaska</option>
  <option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
  <option value="CA">California</option>
  <option value="NV">Nevada</option>
  <option value="OR">Oregon</option>
  <option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
  <option value="AZ">Arizona</option>
  <option value="CO">Colorado</option>
  <option value="ID">Idaho</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NM">New Mexico</option>
  <option value="ND">North Dakota</option>
  <option value="UT">Utah</option>
  <option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
  <option value="AL">Alabama</option>
  <option value="AR">Arkansas</option>
  <option value="IL">Illinois</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="OK">Oklahoma</option>
  <option value="SD">South Dakota</option>
  <option value="TX">Texas</option>
  <option value="TN">Tennessee</option>
  <option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="IN">Indiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="OH">Ohio</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WV">West Virginia</option>
</optgroup>
</select>
						</div>

						<div>
							<select class="form-control select2" data-toggle="select2" multiple>
<option value="one">First</option>
<option value="two" disabled="disabled">Second (disabled)</option>
<option value="three">Third</option>
</select>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-7 col-xxl-6 d-flex">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Date Range Picker</h5>
						<h6 class="card-subtitle text-muted">Component for choosing date ranges, dates and times.</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-xl-4">
								<div class="form-group">
									<label class="form-label">Date Range</label>
									<input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
								</div>
							</div>

							<div class="col-12 col-xl-8">
								<div class="form-group">
									<label class="form-label">Date Range with Times</label>
									<input class="form-control" type="text" name="datetimes" />
								</div>
							</div>

							<div class="col-12 col-xl-4">
								<div class="form-group mb-xl-0">
									<label class="form-label">Single Date Picker</label>
									<input class="form-control" type="text" name="datesingle" />
								</div>
							</div>

							<div class="col-12 col-xl-8">
								<div class="form-group mb-xl-0">
									<label class="form-label">Predefined Date Ranges</label>
									<div id="reportrange" class="overflow-hidden form-control">
										<i class="far fa-calendar"></i>&nbsp;
										<span></span> <i class="fas fa-caret-down"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Input Masks</h5>
						<h6 class="card-subtitle text-muted">jQuery Plugin to make masks on form fields.</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<label>Date</label>
									<input type="text" class="form-control" data-mask="00/00/0000">
									<span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
								</div>
								<div class="form-group">
									<label>Hour</label>
									<input type="text" class="form-control" data-mask="00:00:00">
									<span class="font-13 text-muted">e.g "HH:MM:SS"</span>
								</div>
								<div class="form-group">
									<label>Date & Hour</label>
									<input type="text" class="form-control" data-mask="00/00/0000 00:00:00">
									<span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span>
								</div>
								<div class="form-group">
									<label>ZIP Code</label>
									<input type="text" class="form-control" data-mask="00000-000">
									<span class="font-13 text-muted">e.g "xxxxx-xxx"</span>
								</div>
								<div class="form-group">
									<label>Crazy Zip Code</label>
									<input type="text" class="form-control" data-mask="0-00-00-00">
									<span class="font-13 text-muted">e.g "x-xx-xx-xx"</span>
								</div>
								<div class="form-group">
									<label>Money</label>
									<input type="text" class="form-control" data-mask="000.000.000.000.000,00" data-reverse="true">
									<span class="font-13 text-muted">e.g "Your money"</span>
								</div>
								<div class="form-group">
									<label>Money 2</label>
									<input type="text" class="form-control" data-mask="#.##0,00" data-reverse="true">
									<span class="font-13 text-muted">e.g "#.##0,00"</span>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<label>Telephone</label>
									<input type="text" class="form-control" data-mask="0000-0000">
									<span class="font-13 text-muted">e.g "xxxx-xxxx"</span>
								</div>
								<div class="form-group">
									<label>Telephone with Code Area</label>
									<input type="text" class="form-control" data-mask="(00) 0000-0000">
									<span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>
								</div>
								<div class="form-group">
									<label>US Telephone</label>
									<input type="text" class="form-control" data-mask="(000) 000-0000">
									<span class="font-13 text-muted">e.g "(xxx) xxx-xxxx"</span>
								</div>
								<div class="form-group">
									<label>São Paulo Celphones</label>
									<input type="text" class="form-control" data-mask="(00) 00000-0000">
									<span class="font-13 text-muted">e.g "(xx) xxxxx-xxxx"</span>
								</div>
								<div class="form-group">
									<label>CPF</label>
									<input type="text" class="form-control" data-mask="000.000.000-00" data-reverse="true">
									<span class="font-13 text-muted">e.g "xxx.xxx.xxxx-xx"</span>
								</div>
								<div class="form-group">
									<label>CNPJ</label>
									<input type="text" class="form-control" data-mask="00.000.000/0000-00" data-reverse="true">
									<span class="font-13 text-muted">e.g "xx.xxx.xxx/xxxx-xx"</span>
								</div>
								<div class="form-group">
									<label>IP Address</label>
									<input type="text" class="form-control" data-mask="099.099.099.099" data-reverse="true">
									<span class="font-13 text-muted">e.g "xxx.xxx.xxx.xxx"</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", function(event) {
				// Select2
				$('.select2').each(function() {
					$(this)
						.wrap('<div class="position-relative"></div>')
						.select2({
							placeholder: 'Select value',
							dropdownParent: $(this).parent()
						});
				})
				// Daterangepicker
				$('input[name="daterange"]').daterangepicker({
					opens: 'left'
				});
				$('input[name="datetimes"]').daterangepicker({
					timePicker: true,
					opens: 'left',
					startDate: moment().startOf('hour'),
					endDate: moment().startOf('hour').add(32, 'hour'),
					locale: {
						format: 'M/DD hh:mm A'
					}
				});
				$('input[name="datesingle"]').daterangepicker({
					singleDatePicker: true,
					showDropdowns: true
				});
				var start = moment().subtract(29, 'days');
				var end = moment();

				function cb(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
				$('#reportrange').daterangepicker({
					startDate: start,
					endDate: end,
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					}
				}, cb);
				cb(start, end);
			});
		</script>

	</div>
</main>