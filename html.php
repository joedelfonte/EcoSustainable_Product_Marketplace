<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>DataTables Example</h1>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
            </tr>
            
        </thead>
        

        <script type="text/javascript">
            $(document).ready(function() {
                $('#myTable').DataTable({

                });
            });
        </script>
    </table>
    <table> 
        <tr> 
            <th>GFG UserHandle</th> 
            <th>Practice Problems</th> 
            <th>Coding Score</th> 
            <th>GFG Articles</th> 
        </tr> <!-- PHP CODE TO FETCH DATA FROM ROWS --> 
        <?php include('connect.php'); // LOOP TILL END OF DATA 
        while($rows=$result->fetch_assoc()) { ?> <tr> <!-- FETCHING DATA FROM EACH ROW OF EVERY COLUMN --> <td>
            <?php echo $rows['username'];?></td> <td><?php echo $rows['problems'];?></td> <td><?php echo $rows['score'];?></td> <td><?php echo $rows['articles'];?></td> </tr> <?php } $mysqli->close(); ?> </table>
    
</body>
</html>
