<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';
    protected $fillable=[
        'id',
        'full_name',
        'gender',
        'birthdate',
        'phone_number',
        'address',
        'user_id'
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_person');
    }

    // public function getAll(){
    //     $person = DB::table('persons')
    //     ->join('users' , 'persons.user_id' , '=','users.id')
    //     ->join('companies','persons.company_id','=' ,'companies.id')
    //     ->select('persons.*', 'users.name as user_name', 'companies.name as company_name')

    //     ->orderBy('persons.id' , 'desc')
    //     ->get();

    //     return $person;
    // }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function getAll()
    {
        return self::with('user', 'company')->orderBy('id', 'desc')->get();
    }

}