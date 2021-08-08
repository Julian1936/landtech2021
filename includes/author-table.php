<?php 

include 'get-json.php';

foreach($authors as $author) {

    $authorArticleCount = 0;
        $averageConversion = array();
        foreach($articles as $article) {
            if($author->id === $article->authorId) {
                $conversionRate = conversionRate($article->attributedSales, $article->views);
                $averageConversion[] = $conversionRate;
                $authorArticleCount++;
            }
        }

        $conversionAverage = array_filter($averageConversion);
        if(count($conversionAverage)) {
            $conversionAverage = array_sum($conversionAverage)/count($conversionAverage);
        }

        $authorsTableArray[] = [
            'name'               => $author->name,
            'article_count'      => $authorArticleCount,
            'conversion_average' => $conversionAverage,
        ];  
    }

    $conversionAverage = array_column($authorsTableArray, 'conversion_average');
    array_multisort($conversionAverage, SORT_DESC, $authorsTableArray);

    $authorTableRow = '';
    foreach($authorsTableArray as $authorRow) {
        $authorTableRow .= '<tr>';
            $authorTableRow .= '<td>';
                $authorTableRow .= $authorRow['name'];
            $authorTableRow .= '</td>';
            $authorTableRow .= '<td>';
                $authorTableRow .= $authorRow['article_count'];
            $authorTableRow .= '</td>';
            $authorTableRow .= '<td>';
                $authorTableRow .= $authorRow['conversion_average'] . '%';
            $authorTableRow .= '</td>';
        $authorTableRow .= '</tr>';
    }

    $authorTable = '<table>';
        $authorTable .= '<thead>';
            $authorTable .= '<tr>';
                $authorTable .= '<th>Author Name</th>';
                $authorTable .= '<th>No. of Articles</th>';
                $authorTable .= '<th>Avg Conversion</th>';
            $authorTable .= '</tr>';
        $authorTable .= '</thead>';
        $authorTable .= '<tbody>';
            $authorTable .= $authorTableRow;
        $authorTable .= '</tbody>';
    $authorTable .= '</table>';