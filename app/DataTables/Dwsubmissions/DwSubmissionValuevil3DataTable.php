<?php

namespace App\DataTables\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValuevil3;
use Form;
use Yajra\Datatables\Services\DataTable;

class DwSubmissionValuevil3DataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'dwsubmissions.dw_submission_valuevil3s.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $dwSubmissionValuevil3s = DwSubmissionValuevil3::query();

        return $this->applyScopes($dwSubmissionValuevil3s);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'id' => ['name' => 'id', 'data' => 'id'],
            'questionId' => ['name' => 'questionId', 'data' => 'questionId'],
            'submissionId' => ['name' => 'submissionId', 'data' => 'submissionId'],
            'xformQuestionId' => ['name' => 'xformQuestionId', 'data' => 'xformQuestionId'],
            'value' => ['name' => 'value', 'data' => 'value']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dwSubmissionValuevil3s';
    }
}
