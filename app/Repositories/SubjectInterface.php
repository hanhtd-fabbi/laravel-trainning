<?php

namespace App\Repositories;

interface SubjectInterface
{
    public function all();
    public function show($id);
    public function update($data, $id);
    public function destroy($id);
    public function store($data);
}
