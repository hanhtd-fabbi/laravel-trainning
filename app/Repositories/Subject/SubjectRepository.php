<?php

namespace App\Repositories\Subject;

use App\Repositories\RepositoryAbstract;
use App\Models\Subject;

class SubjectRepository extends RepositoryAbstract implements SubjectInterface
{
    /**
     * @var string
     */
    public function __construct(Subject $subjects)
    {
        parent::__construct();

        $this->modelName = 'Subject';
        $this->model = $subjects;
        $this->table = 'subjects';
    }
}
