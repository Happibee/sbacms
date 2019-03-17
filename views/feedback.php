<?php
        include "includes/header.php";
        include_once "../classes/review.php";

        $database = new Database();
        $db = $database->getConnection();

        $review = new Review($db);
        $stmt = $review->viewReview();

?>

<div class='container'>
<div class='container'>
        <br>
	<h2 class='text-center'>Comments and Suggestions</h2>
        <br>
<?php
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        echo "
	<div class='card'>
	    <div class='card-body'>
	        <div class='row'>
        	    <div class='col-md-2'>
        	    </div>
        	    <div class='col-md-10'>
                        <p><strong>".$row['firstName']."</strong></p>
        	        <div class='clearfix'>";
                        //section contains the star rating, star rating displayed according to rating data
                        if($row['rating'] == '5'){
                                echo "
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>";
                        }
                        elseif ($row['rating'] == '4') {
                                echo "
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='far fa-star'></span>";
                        }
                        elseif ($row['rating'] == '3') {
                                echo "
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>";
                        }
                        elseif ($row['rating'] == '2') {
                                echo "
                                <span class='fas fa-star'></span>
                                <span class='fas fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>";
                        } 
                        elseif ($row['rating'] == '1') {
                                echo "
                                <span class='fas fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>";
                        }
                        else {
                                echo "
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>
                                <span class='far fa-star'></span>";
                        }       
                        echo "
                        </div><br>
        	        <p>".$row['feedback']."</p>
        	    </div>
	        </div>
	    </div>
	</div>
        <br>";
        }
?>
</div>
</div>

<?php
        include "footer.php";
?>