

<?php
    function getEventData($eventID) {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, get_site_url() . "/wp-json/tribe/events/v1/events/" . $eventID); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch); 

        return json_decode($output);
    }

    function getAllEvents() {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, get_site_url() . "/wp-json/tribe/events/v1/events/"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch); 

        return json_decode($output);
    }

    function getFeaturedImages() {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, get_site_url() . "/wp-json/wp/v2/media/"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // var_dump($output);

        // close curl resource to free up system resources 
        curl_close($ch); 

        $images = json_decode($output);
        $imageArr = array();

        foreach($images as $image):
            array_push($imageArr, $image->guid->rendered);
        endforeach;


        return $imageArr[array_rand($imageArr)];
    }

    function getRandomFact() {
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, get_site_url() . "/wp-json/wp/v2/random-facts/"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch); 

        $facts = json_decode($output);
        $factsArr = array();

        foreach($facts as $fact):
            array_push($factsArr, $fact->acf->fact);
        endforeach;

        return $factsArr[array_rand($factsArr)];
    }

    function generateArticle($article){
        
        echo('<div class="Article">
            <h5 class="Article-title">'.$article['post_title'].'</h5>
            <div class="row">
                <a href="' . $article["guid"] . '">
                    <div class="Article-image" style="background-image: url('.get_the_post_thumbnail_url($article['ID']).'); "></div>
                </a>
                <div class="Article-description">
                    <div>'
                        . get_fields($article['ID'])['brief_description'] .
                    '</div>
                    <div class="viewMore">
                        <a href="' . $article["guid"] . '">View More &gt;</a>
                    </div>'.
                '</div>
            </div>
        </div>');
    }
?>