<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dwsubmissions\DwSubmission015;
use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;
use App\Indicators\DeliveriesPerMonth;
use App\Indicators\GreaterThan4ANCVisitsPerMonth;
use App\Indicators\Within2DaysMothersPNCVisitsPerMonth;
use App\Indicators\Within2DaysBabiesPNCVisitsPerMonth;
use App\Indicators\BabiesBornPerMonth;
use App\Indicators\OneOrMoreVaccinations;
use App\Indicators\SkilledHealthAttendedDeliveriesPerMonth;
use App\ChartHelpers\CumulativeANCHelper;
use App\ChartHelpers\CumulativePNCHelper;
use App\ChartHelpers\CumulativeMeaslesHelper;
use App\ChartHelpers\CumulativeBabiesPNCHelper;
use App\ChartHelpers\CumulativeSkilledDeliveriesHelper;
use App\ChartHelpers\PNCBabiesGenderTooltipHelper;

use App\ChartHelpers\Traits\CombineChartColumnsTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

		$cumulative15to19ANCData = (new CumulativeANCHelper(GreaterThan4ANCVisitsPerMonth::indicator15to19(), DeliveriesPerMonth::indicator15to19(), '15-19'))->C3FormatData;
		$cumulative20to49ANCData = (new CumulativeANCHelper(GreaterThan4ANCVisitsPerMonth::indicator20to49(), DeliveriesPerMonth::indicator20to49(), '20-49'))->C3FormatData;
		$cumulativeDisaggregatedANCData = self::combineChartColumns($cumulative15to19ANCData, $cumulative20to49ANCData);

		//

		$cumulative15to19SkilledDeliveriesData = (new CumulativeSkilledDeliveriesHelper(SkilledHealthAttendedDeliveriesPerMonth::indicator15to19(), DeliveriesPerMonth::indicator15to19(), '15-19'))->C3FormatData;
		$cumulative20to49SkilledDeliveriesData = (new CumulativeSkilledDeliveriesHelper(SkilledHealthAttendedDeliveriesPerMonth::indicator20to49(), DeliveriesPerMonth::indicator20to49(), '20-49'))->C3FormatData;
		$cumulativeDisaggregatedSkilledDeliveriesData = self::combineChartColumns($cumulative15to19SkilledDeliveriesData, $cumulative20to49SkilledDeliveriesData);

		//

		$cumulative15to19PNCData = (new CumulativePNCHelper(Within2DaysMothersPNCVisitsPerMonth::indicator15to19(), DeliveriesPerMonth::indicator15to19(), '15-19'))->C3FormatData;
		$cumulative20to49PNCData = (new CumulativePNCHelper(Within2DaysMothersPNCVisitsPerMonth::indicator20to49(), DeliveriesPerMonth::indicator20to49(), '20-49'))->C3FormatData;
		$cumulativeDisaggregatedMothersPNCData = self::combineChartColumns($cumulative15to19PNCData, $cumulative20to49PNCData);

		//

		$cumulativeMaleBabiesPNCData = (new CumulativeBabiesPNCHelper(Within2DaysBabiesPNCVisitsPerMonth::indicatorMaleBabies(), BabiesBornPerMonth::indicatorMaleBabies(), 'Male Babies'))->C3FormatData;
		$cumulativeFemaleBabiesPNCData = (new CumulativeBabiesPNCHelper(Within2DaysBabiesPNCVisitsPerMonth::indicatorMaleBabies(), BabiesBornPerMonth::indicatorFemaleBabies(), 'Female Babies'))->C3FormatData;
		$cumulativeDisaggregatedBabiesPNCData = self::combineChartColumns($cumulativeMaleBabiesPNCData, $cumulativeFemaleBabiesPNCData);

		//

		$cumulativeMothersPNCData = (new CumulativePNCHelper(Within2DaysMothersPNCVisitsPerMonth::indicatorTotals(), DeliveriesPerMonth::indicatorTotals(), 'Mothers'))->C3FormatData;
		$cumulativeBabiesPNCData = (new CumulativeBabiesPNCHelper(Within2DaysBabiesPNCVisitsPerMonth::indicatorTotals(), BabiesBornPerMonth::indicatorTotals(), 'Babies'))->C3FormatData;
		//problem is the Mothers data goes back further - How? It has 2017 - because deliveries does
		$cumulativeTotalPNCData = self::combineChartColumns($cumulativeMothersPNCData, $cumulativeBabiesPNCData);
		$startDateString = $cumulativeMothersPNCData[0][1];
		$endDateString = array_slice($cumulativeMothersPNCData[0], -1)[0];

		//measles
		$cumulative0to11Vaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicator0to11Totals(), '0 to 11 Months'))->C3FormatData;
		$cumulative12to23Vaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicator12to23Totals(), '12 to 23 Months'))->C3FormatData;
		$cumulativeTotalVaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicatorTotals(), 'Number of Babies'))->C3FormatData;
		$cumulativeAgeDisaggregatedTotalVaccinationData = self::combineChartColumns($cumulative0to11Vaccinations, $cumulative12to23Vaccinations);
		$cumulativeTotalVaccinationData = self::combineChartColumns($cumulativeAgeDisaggregatedTotalVaccinationData, $cumulativeTotalVaccinations);
		//measles gender disagg
		$cumulative0to11BoysVaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicatorMale0to11(), 'Male Babies 0 to 11 Months'))->C3FormatData;
		$cumulative12to23BoysVaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicatorMale12to23(), 'Male Babies 12 to 23 Months'))->C3FormatData;
		$cumulative0to11GirlsVaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicatorFemale0to11(), 'Female Babies 0 to 11 Months'))->C3FormatData;
		$cumulative12to23GirlsVaccinations = (new CumulativeMeaslesHelper(OneOrMoreVaccinations::indicatorFemale12to23(), 'Female Babies 12 to 23 Months'))->C3FormatData;
		$cumulative0to11GenderDisaggregatedVaccinationData = self::combineChartColumns($cumulative0to11BoysVaccinations, $cumulative0to11GirlsVaccinations);
		$cumulative12to23GenderDisaggregatedVaccinationData = self::combineChartColumns($cumulative12to23BoysVaccinations, $cumulative12to23GirlsVaccinations);
		$cumulativeAgeGenderDisaggregatedVaccinationData = self::combineChartColumns($cumulative0to11GenderDisaggregatedVaccinationData, $cumulative12to23GenderDisaggregatedVaccinationData);
    
		return view('home')
			->with('cumulativeANCData', (new CumulativeANCHelper(GreaterThan4ANCVisitsPerMonth::indicatorTotals(), DeliveriesPerMonth::indicatorTotals(), 'All Women'))->C3FormatData)
			->with('cumulativeSkilledDeliveriesData', (new CumulativeSkilledDeliveriesHelper(SkilledHealthAttendedDeliveriesPerMonth::indicatorTotals(), DeliveriesPerMonth::indicatorTotals(), 'All Live Births' ))->C3FormatData)
			->with('cumulativePNCData', $cumulativeTotalPNCData)
			->with('cumulativeDisaggregatedANCData', $cumulativeDisaggregatedANCData)
			->with('cumulativeDisaggregatedSkilledDeliveriesData', $cumulativeDisaggregatedSkilledDeliveriesData)
			->with('cumulativeDisaggregatedMothersPNCData', $cumulativeDisaggregatedMothersPNCData)
			->with('cumulativeDisaggregatedBabiesPNCData', $cumulativeDisaggregatedBabiesPNCData)
			->with('cumulativeDisaggregatedVaccinationData', $cumulativeTotalVaccinationData)
			->with('cumulativeAgeGenderDisaggregatedVaccinationData', $cumulativeAgeGenderDisaggregatedVaccinationData)
			->with('PNCbabiesAdditionalTooltipData', (new PNCBabiesGenderTooltipHelper(array_slice($cumulativeMothersPNCData[1], 1), Within2DaysBabiesPNCVisitsPerMonth::indicatorMaleBabies(), Within2DaysBabiesPNCVisitsPerMonth::indicatorFemaleBabies(), $startDateString, $endDateString))->boysGirlsArray);
    }

	use CombineChartColumnsTrait;
}
