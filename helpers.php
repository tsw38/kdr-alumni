<?php

    function generateArticle($article){
        echo('<div class="Article">
            <h5 class="Article-title">'.$article['post_title'].'</h5>
            <div class="row">
                <div class="Article-image" style="background-image: url('.get_the_post_thumbnail_url($article['ID']).'); ">
                </div>
                <div class="Article-description">
                    <div>'
                        . $article['post_content'] .
                    '</div>
                    <div class="viewMore">
                        <a href="' . $article["guid"] . '">View More &gt;</a>
                    </div>'.
                '</div>
            </div>
        </div>');
    }

?>