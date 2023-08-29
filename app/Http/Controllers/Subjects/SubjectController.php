<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectReq;
use App\Repositories\SubjectInterface;
use App\Repositories\SubjectRepository;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
    private $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
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
        $this->subjectRepository->store($request);

        return redirect()->route('index.subject');
    }
}
