<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/css/font-awesome-4.7.0.min.css") }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="skin-blue">
    <div id="app">
        <nav class="fix-navbar navbar navbar-default navbar-static-top">
            <div class="container">
				<!-- Branding Image -->
				<div class="row">
					<div class="col-sm-4 col-xs-5">
						<div class="navbar-header" href="{{ url('/') }}">
							<a class="navbar-brand left-logo-adjust" href="{{ url('/') }}">
								<img height="50" alt="Plan International" src="plan-biaag-logo.png">
							</a>
						</div>
					</div>
					<div class="col-sm-4 col-xs-0">
						<a class="navbar-brand centered-title" href="{{ url('/') }}">
							{{ config('app.name', 'Laravel') }}
						</a>
					</div>


					<div class="col-sm-4 col-xs-7">
						<!-- Right Side Of Navbar -->
						<ul class="nav navbar-nav navbar-right">
							<!-- Authentication Links -->
							@if (Auth::guest())
								<li><a href="{{ url('/login') }}">Login</a></li>
								<li><a href="{{ url('/register') }}">Register</a></li>
							@else
								<li class="left-dropdown dropdown">
									<a href="#" class="dropdown-text dropdown-toggle" data-toggle="dropdown"  aria-expanded="false">
										{{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu">
										<li>
											@hasanyrole('manage_users|acl_admin|basic_manage_users')
												<a href="{{ url('/admin/home') }}">
														Admin
												</a>
											@else
												<a href="{{ url('/change_password') }}">
													Change Password	
												</a>
											@endhasanyrole
											<a href="{{ url('/logout') }}"
												onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
												Logout
											</a>

											<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
							@endif
							<a class="right-logo-adjust pull-right" href="{{ url('/') }}">
								<img height="30" alt="Plan International" src="Canwordmark_colour.jpg">
							</a>
						</ul>
					</div>
				</div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
               @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
	<script type="text/javascript">
		var chartsData = [
			{
				title: 'Antenatal Care', 
				description: '% of women aged 15-49 who gave birth and received antenatal care (ANC) by a skilled health provider at least 4 times during pregnancy',
				visualisations: [
					{
						title: 'Total',
						description: '% of women aged 15-49 who received antenatal care (ANC) by a skilled health provider at least 4 times during pregnancy',
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 79.3,
								text: "Target"
							}
						],
						additionalTooltipData: {},
						colours: {
							"Target": "rgb(0,0,0)",
							"All Women": "rgb(213,94,0)"
						},
						data: {!! json_encode($cumulativeANCData) !!},
					},
					{
						title: 'By Age',
						description: '% of women aged 15-49 who received antenatal care (ANC) by a skilled health provider at least 4 times during pregnancy (disaggregated by age)',
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 72.4,
								position: 'start',
								text: "Target 15-19"
							},
							{ 
								value: 81.8,
								text: "Target 20-49"
							},
						],
						additionalTooltipData: {},
						colours: {
							"Target 15-19": "rgb(230,159,0)",
							"Target 20-49": "rgb(86,180,233)",
							"15-19": "rgb(0,158,115)",
							"20-49": "rgb(240,228,66)",
						},
						data: {!! json_encode($cumulativeDisaggregatedANCData) !!},
					}
				]
			},
			{
				title: 'Skilled Birth Delivery',
				description: '% of live births attended by skilled health personnel', 
				visualisations: [
					{
						title: 'Total',
						description: '% of live births attended by skilled health personnel', 
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 67.6,
								text: "Target"
							},
						],
						additionalTooltipData: {},
						colours: {
							"Target": "rgb(0,0,0)",
							"All Live Births": "rgb(213,94,0)"
						},
						data: {!! json_encode($cumulativeSkilledDeliveriesData) !!},
					},
					{
						title: 'By Age',
						description: '% of live births attended by skilled health personnel (disaggregated by age)', 
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 60.2,
								position: 'start',
								text: "Target 15-19"
							},
							{ 
								value: 70.3,
								text: "Target 20-49"
							},
						],
						additionalTooltipData: {},
						colours: {
							"Target 15-19": "rgb(230,159,0)",
							"Target 20-49": "rgb(86,180,233)",
							"15-19": "rgb(0,158,115)",
							"20-49": "rgb(240,228,66)",
						},
						data: {!! json_encode($cumulativeDisaggregatedSkilledDeliveriesData) !!},
					}
				],
			},
			{
				title: 'Postnatal Care', 
				description: '% of mothers or babies aged 15-49 who received postnatal care within one or two days of delivery (disaggregated by age)',
				visualisations: [
					{
						title: 'Total',
						show_legend: ['Mothers', 'Babies', 'Target Babies', 'Target Mothers'], 
						description: '% of mothers, and percentage of babies, who received postnatal care within two days of childbirth',
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 67.4,
								position: 'start',
								text: "Target Mothers"
							},
							{ 
								value: 70.6,
								text: "Target Babies"
							},
						],
						additionalTooltipDataTest: (id) => {
							return (id=="Boys" || id=="Girls");
						},
						colours: {
							"Target Mothers": "rgb(230,159,0)",
							"Target Babies": "rgb(86,180,233)",
							"Mothers": "rgb(0,158,115)",
							"Babies": "rgb(240,228,66)",
							"Boys": "rgb(0,114,178)",
							"Girls": "rgb(213,94,0)",
						},
						data: {!! json_encode($cumulativePNCData) !!}.concat({!! json_encode($PNCbabiesAdditionalTooltipData) !!})
					},
					{
						title: 'By Age',
						description: '% of mothers who received postnatal care within two days of childbirth (disaggregated by age)',
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 48.1,
								position: 'start',
								text: "Target Mothers 15-19"
							},
							{ 
								value: 72.3,
								text: "Target Mothers 20-49"
							},
						],
						additionalTooltipData: {},
						colours: {
							"Target Mothers 15-19": "rgb(230,159,0)",
							"Target Mothers 20-49": "rgb(86,180,233)",
							"15-19": "rgb(0,158,115)",
							"20-49": "rgb(240,228,66)",
						},
						data: {!! json_encode($cumulativeDisaggregatedMothersPNCData) !!},
					},
					{
						title: 'By Sex of Baby',
						description: '% of babies who received postnatal care within two days (disaggregated by sex of baby)',
						labelText: 'Percent %',
						dataTooltipSuffix: '%', 
						targets: [
							{ 
								value: 69.3,
								position: 'start',
								text: "Target Baby Boys"
							},
							{ 
								value: 72.3,
								text: "Target Baby Girls"
							},
						],
						additionalTooltipData: {},
						colours: {
							"Target Baby Boys": "rgb(230,159,0)",
							"Target Baby Girls": "rgb(86,180,233)",
							"Male Babies": "rgb(0,158,115)",
							"Female Babies": "rgb(240,228,66)",
						},
						data: {!! json_encode($cumulativeDisaggregatedBabiesPNCData) !!},
					}
				]
			},
			{
				title: 'Measles Vaccinations', 
				description: 'Number of babies who recieved one or more measles vaccination',
				visualisations: [
					{
						title: 'Total',
						description: 'Number of babies who recieved one or more measles vaccination',
						labelText: 'Total',
						dataTooltipSuffix: '', 
						targets: [
						],
						additionalTooltipData: {},
						colours: {
							"0 to 11 Months": "rgb(0,158,115)",
							"12 to 23 Months": "rgb(240,228,66)",
							"Number of Babies": "rgb(0,114,178)",
						},
						data: {!! json_encode($cumulativeDisaggregatedVaccinationData) !!},
					},
					{
						title: 'By Sex of Baby',
						description: 'Number of babies who recieved one or more measles vaccination (disaggregated by sex of baby)',
						labelText: 'Total',
						dataTooltipSuffix: '', 
						targets: [
						],
						additionalTooltipData: {},
						colours: {
							"Male Babies 0 to 11 Months": "rgb(0,158,115)",
							"Male Babies 12 to 23 Months": "rgb(240,228,66)",
							"Female Babies 0 to 11 Months": "rgb(0,114,178)",
							"Female Babies 12 to 23 Months": "rgb(213,94,0)",
						},
						data: {!! json_encode($cumulativeAgeGenderDisaggregatedVaccinationData) !!},
					},
				]
			}
		];
	</script>
    <script src="{{asset("/js/app.js")}}"></script>

</body>
</html>
