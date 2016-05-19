<?php

class Database
{

    function __construct($connection)
    {
        $this->db = $connection;
    }


    /**
     * @param $name
     * @param $suburb
     * @param $rating
     */
    public function querySearch($name, $suburb, $rating)
    {

        $address = '';
        
        

        $qry = $this->db->prepare('SELECT NAME, ADDRESS,SUBURB, rating  FROM hotspots.wifihotspots, hotspots.user_comments WHERE  name ='  // :name , address = :address, suburb = :suburb, rating = :rating');

        $qry->execute(array(
            ':name' => $name,
            ':suburb' => $suburb,
            ':rating' => $rating,
            ':address' => $address,
        )); // run query


        foreach ($qry as $hotspot) {
            echo '<article class="results-container">';
            echo '<div class="container">';
            echo '<div class="review-cards">';
            echo '<a href="sampleItem.html" class="review-card">';
            echo '<div class="media">';
            echo '<img src="images/img-test.png" alt="hotspot-img">';
            echo '</div>';
            echo '<div class="desc">';
            // Change to database values from sql query
            echo '<div class"title">' . $hotspot['NAME'] . '</div>';
            echo '<div class"muted">' . $hotspot['RATING'] . '</div>';
            echo '<div class"muted">' . $hotspot['ADDRESS'] . $hotspot['SUBURB'] .  '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '</article>';
        }

    }

    public function insert()
    {
    

    }


}
?>


