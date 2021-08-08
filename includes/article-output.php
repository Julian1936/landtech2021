<?php

include 'get-json.php';

$articleOutput = '';
foreach($articles as $article) {

    $conversionRate = conversionRate($article->attributedSales, $article->views);
    $publishDate    = date("d/m/Y", strtotime($article->datePublished));

    if($conversionRate >= 10){
        $conversionClass = 'high';
    } elseif($conversionRate >= 8) {
        $conversionClass = 'medium';
    } else {
        $conversionClass = 'low';
    }

    // Foreach to get relevant Author by ID and display their details
    foreach($authors as $author) {
        if($author->id === $article->authorId) {
            $authorName = $author->name;
            $authorUrl  = $author->url;
        }
    }

    $articleOutput .= '<div class="article-wrapper">';
        $articleOutput .= '<div class="article-details">';
            $articleOutput .= '<h2>';
                $articleOutput .= '<a href="' . $article->url . '">';
                    $articleOutput .= $article->title;
                $articleOutput .= '</a>';
            $articleOutput .= '</h2>';
            $articleOutput .= '<p>Published: ' . $publishDate . '</p>';

            $articleOutput .= '<div class="author-details">';
                $articleOutput .= '<img src="images/authors/'.$article->authorId.'.jpg" />';
                $articleOutput .= '<a href="'.$authorUrl.'">';
                    $articleOutput .= $authorName;
                $articleOutput .= '</a>';
            $articleOutput .= '</div>';
        $articleOutput .= '</div>';
        $articleOutput .= '<div class="article-conversion-rate">';
            $articleOutput .= '<h3 class="'.$conversionClass.'-conversion">';
                $articleOutput .= 'Conversion:<br/>';
                $articleOutput .= '<span>' . $conversionRate . '%</span>';
            $articleOutput .= '</h3>';
        $articleOutput .= '</div>';
    $articleOutput .= '</div>';

}