<!DOCTYPE html>
<html>
<head>
    <title>Онлайн кинотеатр</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.carousel.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" type="text/css" href="css/display_films.css">
</head>
<body>


    <!-- <div class="preloader">
        <div class="spinner">
            <span class="sk-inner-circle"></span>
        </div>
    </div> -->


    <!-- MENU -->
    <div class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- NAVBAR HEADER -->
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                </button>
                <!-- lOGO -->
                <a href="index.php" class="navbar-brand">Кино</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="/index.php" class="smoothScroll">Главный</a></li>
                        <li><a href="#" class="smoothScroll">Любимые</a></li>
                        <li><a href="/index.php" class="smoothScroll">Возможности</a></li>
                        <li><a href="/index.php" class="smoothScroll">Регестрируйся</a></li>
                </ul>
            </div>

        </div>
    </div>


    <!-- HOME -->
    <!-- <section id="home" class="parallax-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12">
                        <div class="home-text">
                            <h1>Добро пожаловать на </h1>
                            <p>Чувствуй себя как дома. Но относись уважительно к другим</p>
                            <ul class="section-btn">
                                <a href="#about" class="smoothScroll"><span data-hover="Discover More">Узнать больше</span></a>
                            </ul>
                        </div>
                </div>

            </div>
        </div>

        
        <video controls="" autoplay="" loop="" muted>
            <source src="videos/video2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section> -->









    <section id="about" class="parallax-section" padding-bottom: 107px;>
        <div class="container">
            <div class="row">

                <div class="col-md-offset-1 col-md-10 col-sm-12">
                        <div class="about-info">
                            <h3>Любимые фильмы</h3>
                        </div>
                </div>

            </div>
        </div>
    </section>



 




    <div class="my_container">

        <ul class="my_main">
            <?php
            // Database connection using MySQLi (Assuming you have a connection established)
            include 'config.php'; // Adjust this path as needed

            $query = "SELECT m.id, m.rating_kp, m.rating_imdb, m.rating_filmCritics, m.movieLength, m.name, m.description, m.year, m.poster_url, m.poster_previewUrl, m.genres, m.countries, m.alternativeName, m.names, m.shortDescription, m.logo_url
            FROM Movies_update m
            JOIN favorites f ON m.id = f.movie_id";
            
            $result = $conn->query($query);

            if ($result === false) {
                die('Error, query failed: ' . $conn->error);
            }

            if ($result->num_rows == 0) {
                echo '<div class="">Database is empty</div>';
            } else {

                while ($row = $result->fetch_assoc()) {

                    $id = $row['id'];
                    $name = $row['name'];
                    $poster_url = $row['poster_url'];
                    $genres = $row['genres'];
                    $shortDescription = $row['shortDescription'];
                    $description = $row['description'];
                    $rating_kp = $row['rating_kp'];
                    $rating_imdb = $row['rating_imdb'];
                    $rating_filmCritics = $row['rating_filmCritics'];
                    $movieLength = $row['movieLength'];
                    $countries = $row['countries'];


                    // Display each file with cover image and name on the site
                    echo '<div class="my_item">';
                        

                        echo '<div class="my_name-on-site">'.$name.'</div>';

                        if ($poster_url !== null) {
                            echo '<img src="'.$poster_url.'" alt="Cover Image" width="1000" class="my_item_image">';
                        }
                        if($shortDescription!==null){
                            echo '<div class="description_film">'.$shortDescription.'</div>';
                        }
                        else{
                            echo '<div class="description_film">'.$description.'</div>';

                        }
                        
                        echo '<a href="the_film.php?id='.$id.'"class="my_details-button">More details</a>';
                        echo '<a href="delete_from_favorite.php?id='.$id.'"class="my_details-button red">Delete</a>';
                        
                    echo '</div>';
                    
                }
            }

            $result->close();
            $conn->close();
            $status = isset($_GET['status']) ? $_GET['status'] : '';
            if ($status === 'success') {
                echo "<script>alert('Фильм успешно удален!');</script>";
            } elseif ($status === 'error') {
                echo "<script>alert('Ошибка при удалении!');</script>";
            }
            ?>
        </ul>
    </div>
   <!-- PROJECT -->
   <section id="project" class="parallax-section">
        <div class="container_my">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                        <!-- PROJECT ITEM -->
                        <div class="project-item">
                            <a href="images/i.webp" class="image-popup">
                                <img src="images/i.webp" class="item_mah" alt="">
                            
                                <div class="project-overlay">
                                    <div class="project-info">
                                            <h1>Оставляй комментарии</h1>
                                            <h3>Нажи на это</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>

                <div class="col-md-6 col-sm-6">
                        <!-- PROJECT ITEM -->
                        <div class="project-item">
                            <a href="images/o.webp" class="image-popup">
                                <img src="images/o.webp" class="item_mah" alt="">
                            
                                <div class="project-overlay">
                                    <div class="project-info">
                                            <h1>Стань экспертом</h1>
                                            <h3>Строй свой клуб</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>

                <div class="col-md-6 col-sm-6">
                        <!-- PROJECT ITEM -->
                        <div class="project-item">
                            <a href="images/p.webp" class="image-popup">
                                <img src="images/p.webp" class="item_mah" alt="">
                            
                                <div class="project-overlay">
                                    <div class="project-info">
                                            <h1>Обсуждай спорные темы</h1>
                                            <h3>Можешь дискуссировать</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>

                <div class="col-md-6 col-sm-6">
                        <!-- PROJECT ITEM -->
                        <div class="project-item">
                            <a href="images/u.webp" class="image-popup">
                                <img src="images/u.webp" class="item_mah" alt="">
                            
                                <div class="project-overlay">
                                    <div class="project-info">
                                            <h1>Находи себе интересное</h1>
                                            <h3>Рекомендации для других</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>               

            </div>
        </div>
    </section>
    <footer> <p>&copy; 2023,Все права защищены.</p> </footer>


        
</body>
</html>


