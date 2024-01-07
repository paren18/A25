<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoursModel;
use Illuminate\Support\Facades\Auth;

class HoursController extends Controller
{
    public function submitHours(Request $request)
    {
        try {
            $customMessages = [
                'required' => 'Не все данные введены',
                'numeric' => 'Нужны числа',
                'min' => 'Минимум 1 час',
            ];
            $validatedData = $request->validate([
                'hours' => 'required|numeric|min:1',
            ], $customMessages);

            $employeeId = Auth::id();
            $existingRecord = HoursModel::where('employee_id', $employeeId)->first();

            if ($existingRecord) {
                $existingRecord->update([
                    'hours' => $existingRecord->hours + $validatedData[('hours')],
                ]);
            } else {
                HoursModel::insert([
                    'employee_id' => $employeeId,
                    'hours' => $validatedData[('hours')],
                ]);
            }
            return back()->with(['success' => 'Отработанные часы успешно добавлены']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Произошла ошибка: ' . $e->getMessage()]);
        }
    }
}

