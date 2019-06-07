<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Basic Elements</h1>

		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Input</h5>
					</div>
					<div class="card-body">
						<input type="text" class="form-control" placeholder="Input">
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Textarea</h5>
					</div>
					<div class="card-body">
						<textarea class="form-control" rows="2" placeholder="Textarea"></textarea>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Checkboxes</h5>
					</div>
					<div class="card-body">
						<div>
							<label class="form-check">
			<input class="form-check-input" type="checkbox" value="">
			<span class="form-check-label">
				Option one is this and that&mdash;be sure to include why it's great
			</span>
		</label>
							<label class="form-check">
			<input class="form-check-input" type="checkbox" value="" disabled>
			<span class="form-check-label">
				Option two is disabled
			</span>
		</label>
						</div>
						<div>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" value="option1">
			<span class="form-check-label">
				1
			</span>
		</label>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" value="option2">
			<span class="form-check-label">
				2
			</span>
		</label>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" value="option3" disabled>
			<span class="form-check-label">
				3
			</span>
		</label>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Custom checkboxes</h5>
					</div>
					<div class="card-body">
						<label class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input">
		<span class="custom-control-label">Custom checkbox</span>
	</label>
						<label class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" disabled checked>
		<span class="custom-control-label">Disabled custom checkbox</span>
	</label>
						<label class="custom-control custom-checkbox">
		<input type="checkbox" class="custom-control-input" disabled>
		<span class="custom-control-label">Disabled custom checkbox</span>
	</label>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Custom selects</h5>
					</div>
					<div class="card-body">
						<select class="custom-select mb-3">
		<option selected>Open this select menu</option>
		<option>One</option>
		<option>Two</option>
		<option>Three</option>
	</select>
						<select class="custom-select" multiple>
		<option>Open this select menu</option>
		<option>One</option>
		<option>Two</option>
		<option>Three</option>
	</select>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Sizes</h5>
					</div>
					<div class="card-body">
						<input class="form-control form-control-lg mb-3" type="text" placeholder="Large input">
						<input class="form-control mb-3" type="text" placeholder="Medium input">
						<input class="form-control form-control-sm" type="text" placeholder="Small input">
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Radios</h5>
					</div>
					<div class="card-body">
						<div>
							<label class="form-check">
			<input class="form-check-input" type="radio" value="option1" name="radios-example" checked>
			<span class="form-check-label">
				Option one is this and that&mdash;be sure to include why it's great
			</span>
		</label>
							<label class="form-check">
			<input class="form-check-input" type="radio" value="option2" name="radios-example">
			<span class="form-check-label">
				Option two can be something else and selecting it will deselect option one
			</span>
		</label>
							<label class="form-check">
			<input class="form-check-input" type="radio" value="option3" name="radios-example" disabled>
			<span class="form-check-label">
				Option three is disabled
			</span>
		</label>
						</div>
						<div>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inline-radios-example" value="option1">
			<span class="form-check-label">
				1
			</span>
		</label>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inline-radios-example" value="option2">
			<span class="form-check-label">
				2
			</span>
		</label>
							<label class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="inline-radios-example" value="option3" disabled>
			<span class="form-check-label">
				3
			</span>
		</label>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Custom radios</h5>
					</div>
					<div class="card-body">
						<label class="custom-control custom-radio">
		<input name="custom-radio" type="radio" class="custom-control-input">
		<span class="custom-control-label">Toggle this custom radio</span>
	</label>
						<label class="custom-control custom-radio">
		<input name="custom-radio" type="radio" class="custom-control-input">
		<span class="custom-control-label">Or toggle this other custom radio</span>
	</label>
						<fieldset disabled>
							<label class="custom-control custom-radio">
			<input name="custom-radio-2" type="radio" class="custom-control-input" checked>
			<span class="custom-control-label">Disabled custom radio</span>
		</label>
							<label class="custom-control custom-radio">
			<input name="custom-radio-2" type="radio" class="custom-control-input">
			<span class="custom-control-label">Other disabled custom radio</span>
		</label>
						</fieldset>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Switches</h5>
					</div>
					<div class="card-body">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="customSwitch1">
							<label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
						</div>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
							<label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Selects</h5>
					</div>
					<div class="card-body">
						<select class="form-control mb-3">
		<option selected>Open this select menu</option>
		<option>One</option>
		<option>Two</option>
		<option>Three</option>
	</select>

						<select multiple class="form-control">
		<option>Open this select menu</option>
		<option>One</option>
		<option>Two</option>
		<option>Three</option>
	</select>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Disabled</h5>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label class="form-label">Disabled input</label>
							<input type="text" class="form-control" placeholder="Disabled input" disabled>
						</div>
						<div class="form-group">
							<label class="form-label">Disabled select menu</label>
							<select class="form-control" disabled>
			<option>Disabled select</option>
		</select>
						</div>
						<label class="form-check">
		<input class="form-check-input" type="checkbox" value="" disabled>
		<span class="form-check-label">
			Can't check this
		</span>
	</label>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<h5 class="card-title mb-0">Read only</h5>
					</div>
					<div class="card-body">
						<input class="form-control" type="text" placeholder="Readonly input" readonly>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>