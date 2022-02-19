<?php

namespace ammahmoodtork\accounting\Traits;

use ammahmoodtork\accounting\Models\Document;
use ammahmoodtork\accounting\Models\DocumentDetails;
use ammahmoodtork\accounting\Models\Year;
use Exception;

trait DocumentTrit
{
    public function select($id = null, $page = null, $parent_id = null)
    {
        if (empty($id)) {
            $where_conditions = [];
            if (!empty($parent_id)) $where_conditions[] = ['parent_id', $parent_id];
            $result = Document::where($where_conditions);
            if (!empty($page)) {
                return $result->paginate(20);
            }
            return $result->get();
        }
        return Document::where('id', $id)->first();
    }

    public function add(
        $des,
        $document_details = [],
        $order = null,
        $doc_id_rel = null,
        $type_id = 1,
        $state_id = 1,
        $year_id = null
    ) {
        $data = [
            'des' => $des,
            'type_id' => $type_id,
            'state_id' => $state_id
        ];
        if (!empty($order)) $data['order'] = $order;
        else $data['order'] = 0;
        if (!empty($doc_id_rel)) $data['doc_id_rel'] = $doc_id_rel;
        if (!empty($year_id)) $data['year_id'] = $year_id;
        else $data['year_id'] = Year::orderBy('id', "DESC")->first()->id;

        $document = Document::create($data);

        foreach ($document_details as $item) {
            $doc_details = [
                'doc_id' => $document->id,
                'topic_id' => $item['topic_id'],
                'detailed_id' => $item['detailed_id'],
                'child_id' => !empty($item['child_id'])?$item['child_id']:null,
                'des' => $item['des'],
                'debtor' => $item['debtor'],
                'creaditor' => $item['creaditor']
            ];
            DocumentDetails::create($doc_details);
        }

        return $document;
    }
}
