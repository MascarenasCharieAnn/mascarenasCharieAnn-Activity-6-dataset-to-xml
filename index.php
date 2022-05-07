<?php

include "add_modal.php";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>National Drug Arrests</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

</head>
<body>
<div class="container">
    <h1 class="page-header text-center">National Drug Arrests</h1>
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
        
        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Add Update</a>

        <a href="" class="btn btn-light" target="_blank"> View Website</a>   


            
            <?php 
            session_start();
            if(isset($_SESSION['message'])){
          
            ?>

            <div class="alert alert-info text-center" style="margin-top:20px; width: 100%;"> 
                <?php echo $_SESSION['message'] ?>
            </div>

            <?php
                unset($_SESSION['message']);
            }
            ?>


            <table class="table table-sm table-striped table-condensed" style="margin-top:20px;">
                <thead class="table-dark">
                    <th scope="col">ID Arrest</th>
                    <th scope="col">Year</th>
                    <th scope="col">Agencies</th>
                    <th scope="col">Population</th>
                    <th scope="col">Total Arrests</th>
                    <th scope="col">Total Manufacture</th>
                    <th scope="col">Opioid Manufacture</th>
                    <th scope="col">Marijuana Manufacture</th>
                    <th scope="col">Synthetic Manufacture</th>
                    <th scope="col">Other Manufacture</th>
                  
                    
                </thead>
                
                <tbody>

                    <?php  
            //load the xml file to the table
            $file = simplexml_load_file('files/mascarenasCharieAnn-Activity-6-dataset.xml');

                    //loop through all the data and display each rows
                    foreach($file->arrests as $rows) {
                    ?>

                        <tr>
                            <td> <?php echo $rows->id; ?> </td>
                            <td> <?php echo $rows->year; ?> </td>
                            <td> <?php echo $rows->agencies; ?> </td>
                            <td> <?php echo $rows->population; ?> </td>
                            <td> <?php echo $rows->total_arrests; ?> </td>
                            <td> <?php echo $rows->total_manufacture; ?> </td>
                            <td> <?php echo $rows->opioid_manufacture; ?> </td>
                            <td> <?php echo $rows->marijuana_manufacture; ?> </td>
                            <td> <?php echo $rows->synthetic_manufacture; ?> </td>
                            <td> <?php echo $rows->other_manufacture; ?> </td></td>
                            <td> <?php echo mb_strimwidth($rows->content, 0, 30, "...."); ?> </td>

                            <td>
                                
                                <a href="#edit_<?php echo $rows->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                
                                <a href="#delete_<?php echo $rows->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        <?php include "edit_delete_modal.php"; ?>
                        </tr>
                    <?php 
                    }//closing bracket of foreach
                    ?>
                </tbody>
                    <th scope="col">ID Arrest</th>
                    <th scope="col">Year</th>
                    <th scope="col">Agencies</th>
                    <th scope="col">Population</th>
                    <th scope="col">Total Arrests</th>
                    <th scope="col">Total Manufacture</th>
                    <th scope="col">Opioid Manufacture</th>
                    <th scope="col">Marijuana Manufacture</th>
                    <th scope="col">Synthetic Manufacture</th>                
                    <th scope="col">Other Manufacture</th>
                <tfoot>
                                     
                </tfoot>
            </table>
        

    </div>
    </div>
</div>




<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>