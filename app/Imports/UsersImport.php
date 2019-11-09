<?php
   
namespace App\Imports;
   
use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
    
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'is_admin'          => $row['is_admin'],
            'full_name'         => $row['full_name'],
            'date_of_birth'     => $row['date_of_birth'],
            'gender'            => $row['gender'],
            'phone'             => $row['phone'], 
            'email'             => $row['email'], 
            'nationality'       => $row['nationality'], 
    		'address'           => $row['address'],
    		'suburb'            => $row['suburb'], 
    		'employment'        => $row['employment'], 
    		'occupation'        => $row['occupation'], 
    		'tither'            => $row['tither'], 
    		'weekly_tither'     => $row['weekly_tither'],
    		'monthly_tither'    => $row['monthly_tither'], 
    		'marital_status'    => $row['marital_status'], 
    		'weeding_date'      => $row['weeding_date'], 
    		'born_again'        => $row['born_again'], 
    		'baptized'          => $row['baptized'],
    		'tongues'           => $row['tongues'],
    		'sunday_attendance' => $row['sunday_attendance'], 
    		'bible_study'       => $row['bible_study'], 
    		'tuesday_service'   => $row['tuesday_service'], 
    		'friday_prayers'    => $row['friday_prayers'],
    		'night_vigil'       => $row['night_vigil'], 
    		'pregnant'          => $row['pregnant'], 
    		'delivery_date'     => $row['delivery_date']
    		
        ]);
    }
}