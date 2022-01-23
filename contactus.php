<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact US</title>
	<style type="text/css">
		
           body {
  background-image: url('backgroundpic1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
.image2{
  box-sizing: border-box;
  width: 149px;
  height: 149px;
  margin: 20px;
  border: 5px solid #0082e6;
  padding: 3px;
  background-color: white;
}

input[type="file"]{
	display: ;
}


      label
      h1 {
         color: white;
      }
      /* Style inputs with type="text", select elements and textareas */
input[type=text],  textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

.container {
  border-radius: 5px;
  background-color: #0ACF5A;
  padding: 20px;
  margin-top: 150px;
}
.button
{
   background-color: #F88306;
}
	</style>
</head>
<body>
    <?php
    include"header.php";
    ?>
	<div class="container">
  <form action=" ">
<h1 class="text-center"><b>Contact US</b></h1>

  	<div id="profile-container">
     <div class="image">
   <image id="profileImage" class="image2" src="http://lorempixel.com/100/100">
    </div>
</div>
<input id="imageUpload" type="file" 
       name="profile_photo" placeholder="Photo" required="" capture>
   </input>
   <script type="text/javascript">
   $("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
</script>
<br>
<br>
    <label for="fname">Name:</label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="subject">Subject:</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <button type="submit" class="button" value="Update" class="btn btn-primary">Send message</button>

  </form>
</div>

</body>
</html>