<?php

namespace App\Http\Controllers;

use App\Models\HoursModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SumController extends Controller
{
    public function generateReport()
    {
        $reportData = DB::table('hours')
            ->select('employee_id', 'hours')
            ->get();

        $formattedReport = [];
        foreach ($reportData as $record) {
            $formattedReport[] = [
                'employee_id' => $record->employee_id,
                'total_payment' => $record->hours * 250,
            ];
        }

        return response()->json($formattedReport);
    }

    public function payAllHours()
    {
        try {
            $allHours = HoursModel::all();
            $totalPayment = $allHours->sum('hours') * 250;
            HoursModel::truncate();

            return back()->with(['success' => 'Выплата всей накопившейся суммы: ' . $totalPayment . ' руб.']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Произошла ошибка: ' . $e->getMessage()]);
        }
    }
}
