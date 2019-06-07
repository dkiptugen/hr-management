
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3">Wizard</h1>

		<div class="row">
			<div class="col-12 col-lg-12">
				<div id="smartwizard-arrows-primary" class="wizard wizard-primary mb-4">
					<ul>
						<li><a href="#arrows-primary-step-1">Step Title<br /><small>Step description</small></a></li>
						<li><a href="#arrows-primary-step-2">Step Title<br /><small>Step description</small></a></li>
						<li><a href="#arrows-primary-step-3">Step Title<br /><small>Step description</small></a></li>
						<li><a href="#arrows-primary-step-4">Step Title<br /><small>Step description</small></a></li>
					</ul>

					<div>
						<div id="arrows-primary-step-1" class="">
							Step Content 1
						</div>
						<div id="arrows-primary-step-2" class="">
							Step Content 2
						</div>
						<div id="arrows-primary-step-3" class="">
							Step Content 3
						</div>
						<div id="arrows-primary-step-4" class="">
							Step Content 4
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", function(event) {
				$('#smartwizard-default-primary').smartWizard({
					theme: 'default',
					showStepURLhash: false
				});
				$('#smartwizard-default-success').smartWizard({
					theme: 'default',
					showStepURLhash: false
				});
				$('#smartwizard-default-danger').smartWizard({
					theme: 'default',
					showStepURLhash: false
				});
				$('#smartwizard-default-warning').smartWizard({
					theme: 'default',
					showStepURLhash: false
				});
				$('#smartwizard-arrows-primary').smartWizard({
					theme: 'arrows',
					showStepURLhash: false
				});
				$('#smartwizard-arrows-success').smartWizard({
					theme: 'arrows',
					showStepURLhash: false
				});
				$('#smartwizard-arrows-danger').smartWizard({
					theme: 'arrows',
					showStepURLhash: false
				});
				$('#smartwizard-arrows-warning').smartWizard({
					theme: 'arrows',
					showStepURLhash: false
				});
				// Validation
				var $validationForm = $('#smartwizard-validation');
				$validationForm.validate({
					errorPlacement: function errorPlacement(error, element) {
						$(element).parents('.form-group').append(
							error.addClass('invalid-feedback small d-block')
						)
					},
					highlight: function(element) {
						$(element).addClass('is-invalid');
					},
					unhighlight: function(element) {
						$(element).removeClass('is-invalid');
					},
					rules: {
						'wizard-confirm': {
							equalTo: 'input[name="wizard-password"]'
						}
					}
				});
				$validationForm
					.smartWizard({
						autoAdjustHeight: false,
						backButtonSupport: false,
						useURLhash: false,
						showStepURLhash: false,
						toolbarSettings: {
							toolbarExtraButtons: [$('<button class="btn btn-submit btn-primary" type="button">Finish</button>')]
						}
					})
					.on('leaveStep', function(e, anchorObject, stepNumber, stepDirection) {
						if (stepDirection === 'forward') {
							return $validationForm.valid();
						}
						return true;
					});
				$validationForm.find('.btn-submit').on('click', function() {
					if (!$validationForm.valid()) {
						return;
					}
					alert("Great! The form is valid and ready to submit.");
					return false;
				});
			});
		</script>

	</div>
</main>