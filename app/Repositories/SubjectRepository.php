<?php

namespace App\Repositories;

use App\Models\Subject;
use App\Models\User;

use function PHPUnit\Framework\isEmpty;

class SubjectRepository implements SubjectInterface
{
    public function all()
    {
        return Subject::all();
    }
    public function show($id)
    {
    }
    public function update($data, $id)
    {
    }
    public function destroy($id)
    {
    }
    public function store($data)
    {
        return Subject::create([
            'name' => $data->name,
        ]);
    }
}
