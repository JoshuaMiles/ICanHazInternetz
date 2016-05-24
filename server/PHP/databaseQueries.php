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


        $qry = $this->db->prepare('SELECT NAME, ADDRESS,SUBURB, rating  FROM hotspots.reviews, hotspots.items WHERE  name =');  // :name , address = :address, suburb = :suburb, rating = :rating');

        $qry->execute(array(
            ':name' => $name,
            ':suburb' => $suburb,
            ':rating' => $rating,
            ':address' => $address
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
            echo '<div class"muted">' . $hotspot['ADDRESS'] . $hotspot['SUBURB'] . '</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
            echo '</article>';
        }

    }

    public function insert($postEmail, $hotspotName, $firstName, $rating, $comment)
    {

        echo "INSERT INTO hotspots.reviews( email, hotspotName,firstName, reviewDate ,rating, comment ) VALUES $postEmail,$hotspotName,$firstName," . time() . ",$rating,$comment<br>";

        $qry = $this->db->prepare('
        INSERT INTO
        hotspots.reviews(`email`, `hotspotName`, `firstName`, `reviewDate`, `rating`, `comment`)
        VALUES (:postEmail, :hotspotName, :firstName, :reviewDate, :rating, :comment)');  // :name , address = :address, suburb = :suburb, rating = :rating');

        $qry->execute(array(
            ':postEmail' => $postEmail,
            ':hotspotName' => $hotspotName,
            ':firstName' => $firstName,
            ':reviewDate' => time(),
            ':rating' => $rating,
            ':comment' => $comment
        ));

        print_r( $this->db->errorInfo());


    }


    public function getAverageForRating($hotspotName)
    {


        $qry = $this->db->prepare('SELECT AVG(rating) FROM hotspots.reviews WHERE hotspotName=');

        $qry->execute(array(
            ':hotspotName' => $hotspotName
        ));

        foreach ($qry as $avg) {
            echo $avg;
        }


    }


}

?>


