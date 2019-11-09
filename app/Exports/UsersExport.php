<?php
namespace App\Exports;
  
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::all();
    }
    public function headings(): array
    {
        return [
            '#',
            'is_admin','full_name', 'date_of_birth', 'gender', 'phone', 'email', 'nationality', 
    		'address', 'suburb', 'employment', 'occupation', 'tither', 'weekly_tither',
    		'monthly_tither', 'marital_status', 'weeding_date', 'born_again', 'baptized',
    		'tongues' ,'sunday_attendance', 'bible_study', 'tuesday_service', 'friday_prayers',
    		'night_vigil', 'pregnant', 'delivery_date'
        ];
    }
    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:AE1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}