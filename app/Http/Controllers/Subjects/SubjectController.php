<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectReq;
use App\Repositories\Subject\SubjectInterface;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function index()
    {
        $subjects = $this->subjectRepository->all();

        return view('subjects.create');
    }
    public function store(SubjectReq $request)
    {
        $this->subjectRepository->store($request->all());

        return redirect()->route('index.subject');
    }
}
