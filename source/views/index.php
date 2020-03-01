<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Portfolio Template for Developers</title>
    <!--  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML5 Website Landing Page for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->
    <!-- Global CSS -->
    <style type="text/css">
        <?php
            include (ROOT . '/source/views/assets/plugins/bootstrap/css/bootstrap.min.css');
            include (ROOT . '/source/views/assets/plugins/font-awesome/css/font-awesome.css');
            include (ROOT . '/source/views/assets/css/styles.css');
        ?>
    </style>
    <!--<link rel="stylesheet" href="/source/views/assets/plugins/bootstrap/css/bootstrap.min.css">-->
    <!-- Plugins CSS -->
    <!--<link rel="stylesheet" href="/source/views/assets/plugins/font-awesome/css/font-awesome.css">-->
    
    <!-- github calendar css -->
    <!-- github acitivity css -->
    <!-- Theme CSS -->  
    <!--<link id="theme-style" rel="stylesheet" href="/source/views/assets/css/styles.css">-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php include (ROOT . '/source/components/Sort.php')?>
</head> 

<body>
    <!-- ******HEADER****** --> 
    <header class="header">
        <a href="/login" style="color: black;">Login as Admin</a>                 
    </header><!--//header-->
    
    <div class="container sections-wrapper">
        <div class="row">
            <div class="primary col-md-8 col-sm-12 col-xs-12">
                
                <section class="experience section">
                    <div class="section-inner">
                        <h2 class="heading">Tasks list</h2>
                        <form action="" method="post">
                            Sort by:
                            <?php createRadio($tasksList, 'name'); ?>
                            <label for="name">Name</label>
                            <?php createRadio($tasksList, 'email'); ?>
                            <label for="email">E-mail</label>
                            <?php createRadio($tasksList, 'status'); ?>
                            <label for="status">Status</label>
                            <input type="submit" name="submitSort" value="Sort">
                        </form>
                        <br>
                        <div class="content">
                            <?php foreach($tasksList as $task): ?>
                                <div class="item">
                                    <h3 class="title">
                                        Name: <?php echo $task['name']; ?><br>
                                    <span class="place">
                                        E-mail: <?php echo $task['email']; ?><br>
                                    </span>
                                    <span class="year">
                                        Status: 
                                        <?php 
                                            if ($task['status'])
                                                echo '<input type="checkbox" name="status" disabled checked>';
                                            else
                                                echo '<input type="checkbox" name="status" disabled>';
                                        ?>
                                    </span>
                                    </h3>
                                    Task text: <p><input type="text" style="border: none; background-color: white;" disabled name="text" value=<?php echo'"' . $task['text'] . '"'; ?> ></p>
                                    <p><em>
                                        <?php
                                            if ($task['edid'])
                                                echo 'Text changed by administrator';
                                        ?>
                                    </em></p>
                                </div><!--//item-->
                            <?php endforeach;?>
                            <?php 
                                if ($feedBack)
                                    echo $feedBack;
                            ?>
                            <form action="" method="post">
                                <input type="text" name="name" placeholder="Enter your name" required><br>
                                <input type="email" name="email" placeholder="Enter your E-mail" required><br>
                                <input type="text" name="text" placeholder="Enter your task" required><br>
                                <input type="submit" value="Confirm" name="submitCreate">
                            </form>
                            <?php echo $pagination->get();?>

                        </div><!--//content-->  
                    </div><!--//section-inner 
                            <a href="/name">Sort by name</a>
                            <a href="/email">Sort by email</a>
                            <a href="/status">Sort by status</a>-->                 
                </section><!--//section-->
            </div><!--//primary-->
        </div><!--//row-->
    </div><!--//masonry-->
    
    <!-- ******FOOTER****** --> 
       
</body>
</html> 

