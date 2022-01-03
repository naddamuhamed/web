<!DOCTYPE html>
<html>

<head>
   <title>Registration</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">
      #ui {
         background-color: darkslategrey;
         padding: 20px;
         margin-top: 60px;
         border-radius: 50px;
      }

      #ui label,
      h1 {
         color: white;
      }
      .col-lg-6
      {
         text-align: center;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-lg-3"></div>
         <div class="col-lg-6">
            <div id="ui">
               <h1 class="text-center">Add Group</h1><br>
               <form class="form-group text-center" action="dbgroups.php" method="post" >
                  <!--  enctype='multipart/form-data' onsubmit='return validate(this)' -->
                  <div class="row">
                     <div class="col-lg-7 ">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Group name.." required>
                     </div>
                    
                  </div>
                  <br>
                  <label>Location:</label>
                  <input type="text" name="location" class="form-control" placeholder="Event Location"required>
                  <br>
                <br>
                        <label>Group Capacity:</label>
                        <input type="number" name="capacity" class="form-control"
                           placeholder="how many in the group"required><br>
                      
        
                  <label>registration fees:</label>
                  <input type="text" name="price" class="form-control" placeholder="the price of joining the group"required>
                  <br>
                  <div class="col-lg-6 ">
                        
                         <label >Duration:</label>
                         <br>
                         <label >From:</label>
                         <input type="datetime-local" id="time" name="time">
                         <!-- &nbsp;&nbsp;&nbsp; -->
                        <label >To:</label>
                         <input type="datetime-local" id="time2" name="time2">
                     </div>
                     <br>
                     <br>
                  <button type="submit" class="btn btn-Success">Submit</button>
                  <!-- <button type="submit"  value="submit" class="btn btn-primary">Submit</button> -->
                  <!-- <button type="button"  value="submit" class="btn btn-primary">Submit</button> -->


               </form>
               
            </div>
         </div>
         <div class="col-lg-3"></div>
      </div>
   </div>


</body>

</html>